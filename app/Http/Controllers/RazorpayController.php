<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Razorpay\Api\Api;
use App\Models\Packages;
use App\Models\Purchase;
use App\Models\Transaction;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use App\Models\PaymentGateway;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RazorpayController extends Controller
{

    public function index(){
        return view('razor');
    }
    public function payment(Request $request){
       
        $pg = PaymentGateway::find(2);
        $api = new Api($pg->key, $pg->secret);
        $input = $request->all();
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
               // dd($response);
                $transactiion = new Transaction();
                $pack = Packages::find($request->pid);
                $user_id = $request->uid;
                $transactiion->amount = $pack->price;
                $transactiion->user_id = $request->uid;
                $transactiion->package_id = $request->pid;
                $transactiion->payment_id = $response->id;
                $transactiion->status = 'success';
                $transactiion->save();


                $purchases = new Purchase();
                $purchases->user_id = $transactiion->user_id;
                $purchases->transaction_id = $transactiion->id;
                $purchases->package_id = $transactiion->package_id;
                $purchases->save();

                $userPackage = UserPackage::where('user_id', $transactiion->user_id)->first();
               
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

            } catch (Exception $e) {
                // return  $e->getMessage();
                // Session::put('error',$e->getMessage());
                // return redirect()->back();
                return redirect()
                    ->route('create-transaction')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        }
          
        // Session::put('success', 'Payment successful');
        // return redirect()->back();

    }
}
