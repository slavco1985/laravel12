<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Listing;
use App\Models\Message;
use App\Mail\NewMessage;
use App\Models\AppSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['messages'] = Message::paginate(10);
        return Inertia::render('Admin/Message/Manage',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return  array('error' => $validator->errors());
        }

        $message = new Message();
        $message->name = $request->name;
        $message->mobile = $request->mobile;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->listing_id = $request->bid;
        $message->save();

        $setting = AppSettings::first();
        if(!empty($setting->messsage_notification)){
            $email = Listing::find($request->bid)->user->email;
            try {
                Mail::to($email)->send(new NewMessage($message));
            } 
            catch (Swift_TransportException $e) {
                echo $e->getMessage();
            }
        }
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $this->authorize('delete', $product, Message::class);
        $message->delete();
        return Redirect::back();
    }
}
