<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$notifications = auth()->user()->notifications;

        return view('notifications.index', [
            'unreadNotifications' => auth()->user()->unreadNotifications,
            'readNotifications' => auth()->user()->readNotifications
        ]);
    }

    public function read($id)
    {
        $status = 'success';
        $content =  __("Message mark as read successfully");

        DatabaseNotification::find($id)->markAsRead();

        return back()->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function destroy($id)
    {
        $status = 'success';
        $content =  __("Message delete successfully");

        DatabaseNotification::find($id)->delete();

        return back()->with('process_result',['status' => $status, 'content' => $content]);
    }
}
