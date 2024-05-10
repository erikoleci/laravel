<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Closure extends Model
{
    protected $table = 'account_closure';


    public function user(){
        return $this->belongsTo('App\User', 'user_id' , 'id');
    }

}
