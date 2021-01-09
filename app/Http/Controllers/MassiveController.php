<?php

namespace App\Http\Controllers;

use App\Events\MassiveCreated;
use App\Massive;
use Illuminate\Http\Request;
use App\User;
use App\Notifications\MassiveCreatedNotification;
use Illuminate\Support\Facades\Notification;
Use \Carbon\Carbon;

class MassiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.massives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 'success';
        $content =  __("Message massive sent successfully");

        $this->validate($request, [
            'subject' => 'required',
            'body' => 'required',
        ]);

        //return $request->all();
        $massive = Massive::create([
            'sender_id' => auth()->id(),
            'subject' => $request->subject,
            'body' => $request->body,
            'date_at' => Carbon::now()
        ]);

        //$users = User::all();
        $users = User::where('id', '!=', auth()->id())->get();

        //Notification::send($users, new MassiveCreatedNotification($massive));
        event(new MassiveCreated($massive));

        return back()->with('process_result',['status' => $status, 'content' => $content]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Massive  $massive
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Massive::findOrFail($id);

        return view('admin.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Massive  $massive
     * @return \Illuminate\Http\Response
     */
    public function edit(Massive $massive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Massive  $massive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Massive $massive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Massive  $massive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Massive $massive)
    {
        //
    }
}
