<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_logs extends Model
{
    //
    protected $table='transaction_logs';

    public static function insertDeposits($amount, $user_id, $null, $type)
    {
    }

    public function client(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function deposit(){
      return  $this->belongsTo('App\Deposit', 'id', 'transaction_id');
}

}




