<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function deposits()
    {
        return $this->hasMany('App\Deposit', 'user_id');
    }


    public function credits()
    {
        return $this->hasMany('App\Credit', 'user_id');
    }

    public function withdraws()
    {
        return $this->hasMany('App\Withdraw', 'user_id');
    }

    public function credit_cards()
    {
        return $this->hasMany('App\Credit_card', 'user_id');
    }

    public function account()
    {
        return $this->hasOne('App\Account', 'slug', 'account_id');
    }

    public function uploads()
    {
        return $this->hasMany('App\Upload', 'user_id');
    }

    public function surveys()
    {
        return $this->hasMany('App\Survey', 'user_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id', 'id');
    }

    public function closure()
    {
        return $this->hasMany('App\Closure', 'user_id');
    }

    public function transaction_logs()
    {
        return $this->hasMany('App\Transaction_logs', 'user_id');
    }

    public function collaterals()
    {
        return $this->hasMany('App\Collateral', 'user_id');
    }

    public function manager_forms()
    {
        return $this->hasMany('App\FormData', 'manager_id');
    }

    public function received_alerts()
    {
        return $this->hasMany('App\Email_alert', 'receiver_id');
    }

    public function unread_alerts()
    {
        return $this->hasMany('App\Email_alert', 'receiver_id')->where('email_alerts.read', 0);

    }

    public function unread_projects()
    {
        return $this->hasMany('App\Project', 'user_id')->where('projects.read', 0);

    }




    public function sent_alerts()
    {
        return $this->hasMany('App\Email_alert', 'sender_id');
    }
}
