<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Packages;
use App\Models\Purchase;
use App\Models\SiteInfo;
use App\Models\Transaction;
use App\Models\UserPackage;
use App\Mail\PaymentReceipt;
use Illuminate\Http\Request;
use App\Models\PaymentGateway;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as Qrequest;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PurchaseController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    public function paymentHistory(Request $request){
        $query = Purchase::query();
        if(!empty($request->pack)){
            $query->where('package_id', $request->pack);
        }
        if(!empty($request->fdat)){
            $query->where('created_at', '>=', $request->fdat);
        }
        if(!empty($request->tdat)){
            $query->where('created_at', '<=', Carbon::create($request->tdat)->addDays(1));
        }
        $data['purchase'] = $query->orderBy('id', 'desc')->paginate(10)->appends(Qrequest::all())->through(function($purchas){
            return [
                'id' => $purchas->id,
                'name' => $purchas->puser->name,
                'pack' => $purchas->package->name,
                'transaction_id' => $purchas->transaction_id,
                'dat' =>  Carbon::createFromFormat('Y-m-d H:i:s', $purchas->created_at)->format('M d Y')

            ];
        });
        $data['package'] = Packages::select('id', 'name')->get();
        return Inertia::render('Admin/Payment/Purchase',$data);
    }
    
    public function transactionHistory(Request $request){
        $query = Transaction::query();
        
        if(!empty($request->fdat)){
            $query->where('created_at', '>=', $request->fdat);
        }
        if(!empty($request->tdat)){
            $query->where('created_at', '<=', Carbon::create($request->tdat)->addDays(1));
        }
        $data['transaction'] = $query->orderBy('id', 'desc')->paginate(10)->appends(Qrequest::all())->through(function($trans){
            return [
                'id' => $trans->id,
                'name' => $trans->user->name,
                'pack' => $trans->package->name,
                'transaction_id' => $trans->id,
                'dat' =>  Carbon::createFromFormat('Y-m-d H:i:s', $trans->created_at)->format('M d Y')

            ];
        });
        return Inertia::render('Admin/Payment/Transaction',$data);
    }


    public function store(Request $request)
    {
        $package = Packages::find($request->id);
        if(!empty($package)){
            if($package->price <= 0){
                $uid = Auth::user()->id;
                $existing = UserPackage::where('user_id', $uid)->first(); // Check user hav existing package
                if(!empty($existing) && $existing->package->price > 0){
                    return Redirect::route('listing.create');
                }else{
                    $newDateTime = Carbon::now()->addMonth($package->validity);
                    $expery = $newDateTime->toDateString();
                    if(!empty($existing)){
                        $userPackage = $existing;
                    }else{
                        $userPackage = new UserPackage();
                    }
                    $userPackage->package_id = $package->id;
                    $userPackage->user_id = $uid;
                    $userPackage->expery = $expery;
                    $userPackage->save(); 
                    return Redirect::route('listing.create');
                }
            }else{
                session(['packid' => $request->id]);
                return Inertia::location(route('create-transaction'));
            }
        }
    }

    public function createTransaction(){
        $packid = session('packid');
        $pack = Packages::find($packid);
        if(!empty($pack)){
            $data['pack'] = $pack;
            $site = SiteInfo::firstorNew();
            $data['siteinfo'] = $site;
            $data['fav'] = Storage::url($site->fav);
            $data['uid'] = Auth::user()->id;
            $data['paymentGateway'] = PaymentGateway::where('status', 1)->get();
            return view('purchase/payment', $data);
        }
        
    }

    public function processTransaction(Request $request){
        $packid = session('packid');
        $pack = Packages::find($packid);
        if(!empty($pack)){

            $transactiion = new Transaction();
            $user_id = Auth::user()->id;
            $transactiion->amount = $pack->price;
            $transactiion->user_id = $user_id;
            $transactiion->package_id = $pack->id;
            $transactiion->save();

            $provider = new PayPalClient;
            $paypal = PaymentGateway::find(1);
            $pcong = config('paypal');
            // $pcong['sandbox']['client_id'] = $paypal->key;
            // $pcong['sandbox']['client_secret'] =  $paypal->secret;

            $pcong['live']['client_id'] = $paypal->key;
            $pcong['live']['client_secret'] =  $paypal->secret;

            $provider->setApiCredentials($pcong);
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('success-transaction'),
                    "cancel_url" => route('cancel-transaction'),
                ],
                "purchase_units" => [
                    0 => [
                        "reference_id" => $transactiion->id,
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $pack->price,
                        ],
                        "custom_id" => $user_id,
                        "description" => $pack->name
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                return redirect()
                    ->route('create-transaction')
                    ->with('error', 'Something went wrong.');

            } else {
                return redirect()
                    ->route('create-transaction')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        }
    }

    public function successTransaction(Request $request){
        $provider = new PayPalClient;

        $paypal = PaymentGateway::find(1);
        $pcong = config('paypal');
        // $pcong['sandbox']['client_id'] = $paypal->key;
        // $pcong['sandbox']['client_secret'] =  $paypal->secret;

        $pcong['live']['client_id'] = $paypal->key;
        $pcong['live']['client_secret'] =  $paypal->secret;

        $provider->setApiCredentials($pcong);
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $purchase = $response['purchase_units'];

            $payment_id = $response['id'];
            $tid = $purchase[0]['reference_id'];

            $transactiion = Transaction::find($tid);
            if(!empty($transactiion)){
                $transactiion->payment_id = $payment_id;
                $transactiion->status = 'success';
                $transactiion->update();

                $purchases = new Purchase();
                $purchases->user_id = $transactiion->user_id;
                $purchases->transaction_id = $transactiion->id;
                $purchases->package_id = $transactiion->package_id;
                $purchases->save();

                $userPackage = UserPackage::where('user_id', $transactiion->user_id)->first();
                $pack = Packages::find($transactiion->package_id);
                if(!empty($userPackage)){
                    if($userPackage->package_id == $transactiion->package_id){
                        $newDateTime = new Carbon($userPackage->expery);
                        $newDateTime->addMonth($pack->validity);
                        $expery = $newDateTime->toDateString();
                        $userPackage->expery = $expery;
                        $userPackage->update();

                    }else{
                        $newDateTime = Carbon::now()->addMonth($pack->validity);
                        $expery = $newDateTime->toDateString();
                        $userPackage->package_id = $transactiion->package_id;
                        $userPackage->expery = $expery;
                        $userPackage->update();
                    }
                }else{
                    $userPackage = new UserPackage();
                    $newDateTime = Carbon::now()->addMonth($pack->validity);
                    $expery = $newDateTime->toDateString();

                    $userPackage->user_id = $transactiion->user_id;
                    $userPackage->package_id = $transactiion->package_id;
                    $userPackage->expery = $expery;
                    $userPackage->save();
                }

                return redirect()
                    ->route('payment-success')
                    ->with('tid', $transactiion->id);
            }else{

            }

            
        } else if(isset($response['status']) && $response['status'] == 'CANCEL') {
            $payment_id = $response['id'];
            $tid = $purchase[0]['reference_id'];

            $transactiion = Transaction::find($tid);
            if(!empty($transactiion)){

                $transactiion->payment_id = $payment_id;
                $transactiion->status = 'cancel';
                $transactiion->update();
                return redirect()
                    ->route('payment-success')
                    ->with('tid', $transactiion->id);
            }
            return redirect()
                ->route('create-transaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }else{
            return redirect()
                ->route('create-transaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function cancelTransaction(Request $request){
        return redirect()
        ->route('create-transaction')
        ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function paymentSuccess(){  
        $tid = session('tid');
        $transactiion = Transaction::find($tid);
        if(!empty($transactiion)){
            $data['transaction'] =  $transactiion;
            $email = Auth::user()->email;
            try {
                Mail::to($email)->send(new PaymentReceipt($transactiion));
            } 
            catch (Swift_TransportException $e) {
                echo $e->getMessage();
            }
            return view('purchase.success', $data);
        }
    }
  
}
