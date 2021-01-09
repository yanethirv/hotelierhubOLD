<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\MassiveCreated;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MassiveCreatedNotification;

class MassiveCreatedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MassiveCreated $event)
    {
        //$users = User::all();
        $users = User::where('id', '!=', auth()->id())->get();

        Notification::send($users, new MassiveCreatedNotification($event->massive));

    }
}
