<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportCsv extends Model
{
    //
    protected $table='leads';

    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id', 'id');
    }

}



