<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Notification;
use App\Notifications\LeadsSent;

class Notificationcontroller extends Controller
{
    //


    public function sendLeadsNotification() {
        $userSchema = User::first();
  
       
        Notification::send($userSchema, new LeadsSent);
   
        dd('Task completed!');
    }

}
