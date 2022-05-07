<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyconfirmHvacOffer extends Notification implements ShouldBroadcast
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public $tender;
    public $request;
    public function __construct($user , $request , $tender)
    {
        $this->user=$user;
        $this->request=$request;
        $this->tender=$tender;
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
             'user_owner_Hvac_request'=>$this->user,
            'Offer_Hvac_Confirmed'=>$this->request,
            'tender_confrimed_offer_Hvac'=>$this->tender,




        ];
    }
    public function ToBroadcast($notifiable){

        return new BroadcastMessage([
            'data'=>[

                'user_owner_Hvac_request'=>$this->user,
            'Offer_Hvac_Confirmed'=>$this->request,
            'tender_confrimed_offer_Hvac'=>$this->tender,
            ]
        ]);
    }
}
