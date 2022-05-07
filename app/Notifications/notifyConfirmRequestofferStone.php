<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class notifyConfirmRequestofferStone extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user ; public $request; public $tender;
    public function __construct( $user , $request, $tender)
    {
        $this->user = $user;
        $this->request = $request;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
            'user_owner_Stone_request'=>$this->user,
            'Offer_Stone_Confirmed'=>$this->request,
            'tender_confrimed_offer_Stone'=>$this->tender,

        ];
    }
    public function ToBroadcast($notifiable){

        return new BroadcastMessage([
            'data'=>[

                'user_owner_Stone_request'=>$this->user,
                'Offer_Stone_Confirmed'=>$this->request,
                'tender_confrimed_offer_Stone'=>$this->tender,
            ]
        ]);
    }
}
