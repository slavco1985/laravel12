<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subscribers'] = Subscriber::paginate(10);
        return Inertia::render('Admin/Subscriber/Manage', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->back();
    }
}
