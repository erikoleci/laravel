<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desks extends Model
{
    protected $table = 'desks';


    public function agents(){
        return $this->hasMany('App\Agents', 'manger_desk');
    }

    

}
