<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;
use App\Massive;

class MassiveCreatedNotification extends Notification
{

    use Queueable;

    protected $massive;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Massive $massive)
    {
        $this->massive = $massive;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($notifiable->name . ",")
                    ->subject($this->massive->subject)
                    ->line('You have received a message from Hotelier Hub')
                    ->action('Click here to view message', route('massives.show', $this->massive->id))
                    ->line('Thank you for using our application!');
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'link' => route('massives.show', $this->massive->id),
            'subject' => $this->massive->subject,
            'date' => $this->massive->date_at,
            'sender' => "By " . $this->massive->sender->name
        ];
    }
}
