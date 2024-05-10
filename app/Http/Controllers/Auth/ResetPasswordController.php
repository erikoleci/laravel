<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Traits\AccountsTrait;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;
use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    use AccountsTrait;
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

    protected function resetPassword(User $user, $password)
    {
        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));

        $this->changeMT4Password($user->mt4_account, $password);

        $user->real_password = $password;

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }

    protected $redirectTo = RouteServiceProvider::HOME;
}
