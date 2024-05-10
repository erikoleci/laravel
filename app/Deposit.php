<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    //
    protected $table = 'deposits';

    public function account(){
        return $this->belongsTo('App\Account', 'credit_card_id', 'id');
    }

    public function credit_card(){
        return $this->belongsTo('App\Credit_card', 'credit_card_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id' , 'id');
    }
}
