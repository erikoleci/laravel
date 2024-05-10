<?php

namespace App\Http\Controllers\Auth;

use App\Account;
use App\Http\Controllers\Controller;
use App\Mail\RegistrationEmail;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Traits\AccountsTrait;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use AccountsTrait;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $account=Account::where('slug', $data['account_id'])->first();

        return Validator::make($data, [
            'name' => ['required' , 'string' , 'regex:/^[a-zA-Z]{3,}+(?:\s[a-zA-Z]{3,}+)+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'account_id' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country_code' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'promo_code' => ['exists:promocode,promocode'],
            'over_18' => ['required', 'boolean'],
            'accept_terms' => ['required', 'boolean'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (!isset($data['promo_code'])){
            $data['promo_code']=null;
        }

        if (!isset($data['mt4_account'])){
            $data['mt4_account']=null;
        }
        if (!isset($data['mt4_password'])){
            $data['mt4_password']=null;
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'account_id' => $data['account_id'],
            'password' => Hash::make($data['password']),
            'real_password' => $data['password'],
            'country_code' => $data['country_code'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'city' => $data['city'],
            'address' => $data['address'],
            'promo_code' => $data['promo_code'],
            'over_18' => $data['over_18'],
            'accept_terms' => $data['accept_terms'],
            'mt4_account' => $data['mt4_account'],
            'mt4_password' => $data['mt4_password'],
            'ip' => \Request::ip(),
        ]);
//        $role = Role::create(['name' => 'admin']);

//        $user->assignRole([$data['account_id'],$data['account_id']]);
        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function register(Request $request)
    {
        // $this->validator($request->all())->validate();

        // $createdAccount = json_decode($this->createAccount($request['account_id'], $request['name'], $request['password']));

        // if(!$createdAccount){


        //     return back()->withInput()->withErrors(['There was a problem registering your account!']);
        // }
        // else if($createdAccount&&$createdAccount->Login==0){


        //     return back()->withInput()->withErrors(['There was a problem registering your account!']);
        // }


        // $this->changeStatusUser($createdAccount->Login, 0);

        $request['mt4_account'] = '222222333';
        $request['mt4_password'] = '2222222222';

        event(new Registered($user = $this->create($request->all())));


        // if ($createdAccount&&$createdAccount->Login) {
        //     Mail::to($request['email'])->send(new RegistrationEmail($createdAccount->Login, $createdAccount->Password, $user));
        // }

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    public function register_legacy(Request $request)
    {
        $this->validator($request->all())->validate();

//        $createdAccount = json_decode($this);
//
//        if(!$createdAccount){
////            $this->validator($request->all())->errors()->add('register', 'There was a problem registering!');
//
//            return back()->withInput()->withErrors(['There was a problem registering your account!']);
//        }
//        else if($createdAccount&&$createdAccount->Login==0){
////            $this->validator($request->all())->errors()->add('register', 'There was a problem registering!');
//
//            return back()->withInput()->withErrors(['There was a problem registering your account!']);
//        }
//        if(empty($createdAccount)){
//            return response()->json([
//                'status' => 'error',
//                'msg' => 'There was a problem registering!',
//            ], 400);
//        }

//        $this->changeStatusUser($createdAccount->Login, 0);
//
//        $request['mt4_account'] = $createdAccount->Login;
//        $request['mt4_password'] = $createdAccount->Password;

        event(new Registered($user = $this->create($request->all())));


//        return $request['account_id'];
//        $this->guard()->login($user);
//        if ($createdAccount&&$createdAccount->Login) {
//            Mail::to($request['email'])->send(new RegistrationEmail($createdAccount->Login, $createdAccount->Password, $user));
//        }

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function redirectTo()
    {
        //use your own route
        $regError = 'Please wait for your account to be approved!';
        return route('login', with(['regError'=>$regError]));
    }
}
