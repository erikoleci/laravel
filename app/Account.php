<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $table = 'accounts';

    public function deposits()
    {
        return $this->hasMany('App\Deposit', 'credit_card_id');
    }

    public function users()
    {
        return $this->hasMany('App\User', 'account_id');
    }

}
