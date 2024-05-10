<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeadsSent extends Notification
{
    use Queueable;
    private $LeadsData;
  

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($LeadsData)
    {
        $this->LeadsData = $LeadsData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        
         

            if ($this->LeadsData['real_user'] === 1) {
                return [
                'Notification' => 'You have '.$this->LeadsData['assign_limit'].' new clients assigned'
                 ];
            }

            else {
                return [
                'Notification' => 'You have '.$this->LeadsData['assign_limit'].' new leads assigned'
                ];
            }
            
        
    }
}
