<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Agents extends Authenticatable
{

    use Notifiable, HasRoles;

    protected $table='agents';

    protected $guarded = [];

    protected $casts = [
        'desk' => 'array',
    ];



    public function desks()
    {
        return $this->belongsTo('App\Desks', 'manager_desk', 'id');
    }
}
