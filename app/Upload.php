<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    protected $table = 'uploads';

    public function user(){
        return $this->belongsTo('App\User', 'user_id' , 'id');
    }
}
