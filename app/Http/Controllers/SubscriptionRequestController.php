<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\SubscriptionRequest;
use Illuminate\Http\Request;


class SubscriptionRequestController extends Controller
{
    public function create()
    {
        return view('livewire.admin.subscriptions-request.create');
    }

    public function store(Request $request)
    {

        //dd($request);
        
        $request->validate([
            'subscription_id' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);

        $status = 'success';
        $content = 'Status Request Updated!';

        $input = $request->all();
        
        $subscriptiontRequest = SubscriptionRequest::create($input);

        $subscription = Subscription::findOrFail($request->subscription_id);

        $subscription->update(['status'=>$request->status]);

        return redirect('subscriptions-request')->with('process_result',['status' => $status, 'content' => $content]);
    }
}
