<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class notifyAddOfferConstruction extends Notification implements ShouldBroadcast
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user , $offer, $company;
    public function __construct($company ,$offer, $poster)
    {
        $this->poster=$poster;
        $this->offer=$offer;
        $this->company=$company;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
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
             'tender_construction_owner'=>$this->poster,
            'Company_added_offer_construction'=>$this->company,
            'offer_construction'=>$this->offer,

        ];
    }
    public function ToBroadcast($notifiable){

        return new BroadcastMessage([
            'data'=>[

                'tender_construction_owner'=>$this->poster,
                'Company_added_offer_construction'=>$this->company,
                'offer_construction'=>$this->offer,

            ]
        ]);
    }
}
