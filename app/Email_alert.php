<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email_alert extends Model
{
    //
    protected $table='email_alerts';

    public function receiver(){
        return $this->belongsTo('App\User', 'receiver_id' , 'id');
    }

    public function sender(){
        return $this->belongsTo('App\User', 'sender_id' , 'id');
    }

}
