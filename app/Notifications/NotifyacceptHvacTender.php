<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyacceptHvacTender extends Notification implements ShouldBroadcast
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user ;
    public $tender ;
    public function __construct($user,$tender)
    {
        $this->user = $user;
        $this->tender = $tender;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toArray($notifiable)
    {


        return [
             'tender_hvac_accepted'=>$this->tender,
            'user'=>$this->user,


        ];
    }
    public function ToBroadcast($notifiable){

        return new BroadcastMessage([
            'data'=>[

                'tender_hvac_accepted'=>$this->tender,
                 'user'=>$this->user,

            ]
        ]);
    }
}
