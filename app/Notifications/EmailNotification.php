<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $name1="";
    public $name2="";

    public function __construct($name1,$name2)
    {
        $this->name1 = $name1;
        $this->name2 = $name2;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        $name1=$this->name1;
        $name2 = $this->name2;
        return(new MailMessage)->view('notification',compact('name1','name2'));
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
