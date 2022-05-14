<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyAdminOfferConsulte extends Notification implements ShouldBroadcast
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public $tender;
    public $offerUser;
    public function __construct(User $user, $tender ,$offerUser)
    {

        $this->user = $tender->user;
        $this->added_at = $tender->created_at;
        $this->tender = $tender;
        $this->offerConsulteUser = $offerUser;

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
            'offer_owner'=>$this->user,
            'offer_at'=>$this->added_at,
            'tenderAdminOffer'=>$this->tender,
            'offerConsulteUser'=>$this->offerConsulteUser
        ];
    }
    public function ToBroadcast($notifiable){

        return new BroadcastMessage([
            'data'=>[
                'offer_owner'=>$this->user,
                'offer_at'=>$this->added_at,
                'tenderAdminOffer'=>$this->tender,
            'offerConsulteUser'=>$this->offerConsulteUser

            ]
        ]);
}
}
