<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\User;
use App\Userip;
use App\AllowedIp;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tenfef\IPFind\APIErrorException;
use Tenfef\IPFind\InvalidIPAddressException;
use Tenfef\IPFind\IPFind;
use Tenfef\IPFind\UnexpectedResponseException;

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

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
//        $this->middleware('guest:admin')->except('logout');
//        $this->middleware('guest:black_panther')->except('logout');

    }

    function authenticated(Request $request, $user)
    {

        $apiKey = null; // get an API key from https://ipfind.co or pass in NULL if you plan on using < 100/day
        $ipAdd = request()->ip();
        $result=null;
        $ipfind = new IPFind($apiKey);
        try {
            $geoInfo = $ipfind->fetchIPAddress($ipAdd);
        } catch (APIErrorException $e) {
            return 'APIErrorException'.$e;
        } catch (InvalidIPAddressException $e) {
            return 'InvalidIPAddressException'.$e;

        } catch (UnexpectedResponseException $e) {
            return 'UnexpectedResponseException'.$e;
        }
        if (isset($geoInfo->error)) {
            $ip_country = null;
            $ip_city = null;
            $ip_code = null;
        } else {
            $ip_country = $geoInfo->country;
            $ip_city = $geoInfo->city;
            $ip_code = $geoInfo->country_code;

        }

        if (isset($ipAdd)){
            $user->ip=$ipAdd;
        }
        if (isset($ip_country)){
            $user->ip_country=$ip_country;
        }
        if (isset($ip_city)){
            $user->ip_city=$ip_city;
        }
        if (isset($ip_code)){
            $user->ip_code=$ip_code;
        }

        // $user->last_online_at = Carbon::now()->toDateTimeString();

        $user->save();

        $userLang=allowedLanguage($user->ip_code);
        if ($userLang){
            if ($user->account_id=="admin") {
                $userLang = 'EN';
            }

            // 195.201.237.101
            else if ($user->ip==''){
                $userLang = 'IT';
            }
            App::setLocale($userLang);
            session()->put('locale', $userLang);
        }

        $userip = new Userip;
        $userip->user_id = $user->id;
        $userip->ip = $ipAdd;
        $userip->save();
    }

    protected function credentials(\Illuminate\Http\Request $request)
    {
        //return $request->only($this->username(), 'password');
//        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
        $credentials = ['email' => $request->{$this->username()}, 'password' => $request->password, 'active' => 1, 'account_id' => $request['allowed_role']];
//        $credentials['status'] = 1;
        return $credentials;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        // Load user from database
        $user = User::where($this->username(), $request->{$this->username()})->first();
        $role = $user->getRoleNames();
        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($user && Hash::check($request->password, $user->password) && $user->active != 1) {
            $errors = [$this->username() => trans('auth.failed')];
        }
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        else return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, logged_in())
            ?: redirect()->intended(logged_in()->account_id);
    }

    public function logout(Request $request)
    {
        $role=$request['role'];

        Auth::guard($role)->logout();
        if (Auth::guard('admin')->check())
        {
           logout_except('admin');
            return redirect()->route('admin_home');
        }

        else if (Auth::guard('manager')->check()){
            logout_except('manager');
            return redirect()->route('manager_home');
        }

        else if (Auth::guard('officemanager')->check()){
            logout_except('officemanager');
            return redirect()->route('officemanager_home');
        }


        else {
            return redirect()->route('login');
        }
    }

    public function login_admin(Request $request)
    {


        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);


  

        $ip = $request->ip();
        if (AllowedIp::where('ip', '=', $ip)->count() === 0) {
            return redirect('/');
        }


        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'account_id' => 'admin'], $request->get('remember'))) {

            return $this->sendLoginResponse($request);
        }
        $errors = [$this->username() => trans('auth.failed')];

        return redirect()->back()
        ->withInput($request->only($this->username(), 'remember'))
        ->withErrors($errors);
    }

    public function login_manager(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);


        $ip = $request->ip();
        if (AllowedIp::where('ip', '=', $ip)->count() === 0) {
            return redirect('/');
        }

        if (Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password, 'account_id' => 'manager'], $request->get('remember'))) {

            return $this->sendLoginResponse($request);
        }
        $errors = [$this->username() => trans('auth.failed')];

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }



    public function login_officemanager(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);


        $ip = $request->ip();
        if (AllowedIp::where('ip', '=', $ip)->count() === 0) {
            return redirect('/');
        }


        if (Auth::guard('officemanager')->attempt(['email' => $request->email, 'password' => $request->password, 'account_id' => 'officemanager'], $request->get('remember'))) {

            return $this->sendLoginResponse($request);
        }
        $errors = [$this->username() => trans('auth.failed')];

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }



    public function login_teamleader(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);


        $ip = $request->ip();
        if (AllowedIp::where('ip', '=', $ip)->count() === 0) {
            return redirect('/');
        }

        if (Auth::guard('teamleader')->attempt(['email' => $request->email, 'password' => $request->password, 'account_id' => 'teamleader'], $request->get('remember'))) {

            return $this->sendLoginResponse($request);
        }
        $errors = [$this->username() => trans('auth.failed')];

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }



    public function login_caposala(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);


        $ip = $request->ip();
        if (AllowedIp::where('ip', '=', $ip)->count() === 0) {
            return redirect('/');
        }

        if (Auth::guard('caposala')->attempt(['email' => $request->email, 'password' => $request->password, 'account_id' => 'caposala'], $request->get('remember'))) {

            return $this->sendLoginResponse($request);
        }
        $errors = [$this->username() => trans('auth.failed')];

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }


    public function login_affiliator(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);


        

        if (Auth::guard('affiliator')->attempt(['email' => $request->email, 'password' => $request->password, 'account_id' => 'affiliator'], $request->get('remember'))) {

            return $this->sendLoginResponse($request);
        }
        $errors = [$this->username() => trans('auth.failed')];

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }




    public function login_customer_service(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);


        $ip = $request->ip();
        if (AllowedIp::where('ip', '=', $ip)->count() === 0) {
            return redirect('/');
        }

        if (Auth::guard('customer_service')->attempt(['email' => $request->email, 'password' => $request->password, 'account_id' => 'customer_service'], $request->get('remember'))) {

            return $this->sendLoginResponse($request);
        }
        $errors = [$this->username() => trans('auth.failed')];

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }




    public function login_starter(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('starter')->attempt(['email' => $request->email, 'active'=>1, 'password' => $request->password, 'account_id' => 'starter'], $request->get('remember'))) {

            return $this->sendLoginResponse($request);
        }
        $errors = [$this->username() => trans('auth.failed')];

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }


}
