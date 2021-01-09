<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;

class MessageSent extends Notification
{
    protected $message;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->subject($this->message->subject)
                    ->line('You have received a message.')
                    //->action('Notification Action', url('/'))
                    ->action('Click here to view message', route('messages.show', $this->message->id))
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
        //return $this->message->toArray();
        return [
            'link' => route('messages.show', $this->message->id),
            'subject' => $this->message->subject,
            'date' => $this->message->date_at,
            'sender' => "By " . $this->message->sender->name
        ];
    }
}
