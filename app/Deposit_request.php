<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit_request extends Model
{
    //
    public function client(){
        return $this->belongsTo('App\User', 'user_id' , 'id');
    }

}
