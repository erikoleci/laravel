<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded = [];
    protected $table='status';

//    protected $fillable = ['status'];



    public function user(){
        return $this->hasMany('App\User', 'status');
    }


    public function ImportCsv(){
        return $this->hasMany('App\ImportCsv', 'status');
    }
}






