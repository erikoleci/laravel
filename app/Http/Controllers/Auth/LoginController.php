<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Which Eloquent model backs each guard (per config/auth.php providers).
     */
    protected $guardModels = [
        'admin' => \App\User::class,
        'manager' => \App\Agents::class,
        'affiliator' => \App\Agents::class,
        'officemanager' => \App\Agents::class,
        'caposala' => \App\Agents::class,
        'customer_service' => \App\Agents::class,
        'teamleader' => \App\Agents::class,
        'starter' => \App\User::class,
    ];

    /**
     * Where each guard lands after a successful login.
     */
    protected $guardRedirects = [
        'admin' => '/admin/home_dashboard',
        'manager' => '/manager',
        'affiliator' => '/affiliator',
        'officemanager' => '/officemanager',
        'caposala' => '/caposala',
        'customer_service' => '/customer_service',
        'teamleader' => '/teamleader',
        'starter' => '/starter/home',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Shared handler for every role-specific login form. Each blade form
     * (login_admin, login_manager, ...) posts email/password plus a hidden
     * "allowed_role" field that tells us which guard to authenticate against.
     */
    protected function attemptGuardLogin(Request $request, string $guard)
    {
        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $model = $this->guardModels[$guard] ?? \App\User::class;

        $credentials = $request->only('email', 'password');
        $loginField = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $user = $model::where($loginField, $credentials['email'])->first();

        if (!$user || !\Illuminate\Support\Facades\Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'Kredencialet e dhëna nuk përputhen me të dhënat tona.',
            ])->onlyInput('email');
        }

        // If roles have been assigned via spatie/laravel-permission, enforce them.
        // If nobody has been assigned this role yet (e.g. a fresh demo install),
        // we don't lock everyone out — we just let the guard authenticate.
        if (method_exists($user, 'hasRole') && $model::whereHas('roles')->exists() && !$user->hasRole($guard)) {
            return back()->withErrors([
                'email' => 'Ky përdorues nuk ka rolin e duhur (' . $guard . ') për të hyrë këtu.',
            ])->onlyInput('email');
        }

        Auth::guard($guard)->login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended($this->guardRedirects[$guard] ?? '/home');
    }

    public function login_admin(Request $request)
    {
        return $this->attemptGuardLogin($request, 'admin');
    }

    public function login_manager(Request $request)
    {
        return $this->attemptGuardLogin($request, 'manager');
    }

    public function login_affiliator(Request $request)
    {
        return $this->attemptGuardLogin($request, 'affiliator');
    }

    public function login_officemanager(Request $request)
    {
        return $this->attemptGuardLogin($request, 'officemanager');
    }

    public function login_caposala(Request $request)
    {
        return $this->attemptGuardLogin($request, 'caposala');
    }

    public function login_customer_service(Request $request)
    {
        return $this->attemptGuardLogin($request, 'customer_service');
    }

    public function login_teamleader(Request $request)
    {
        return $this->attemptGuardLogin($request, 'teamleader');
    }

    public function login_starter(Request $request)
    {
        return $this->attemptGuardLogin($request, 'starter');
    }
}
