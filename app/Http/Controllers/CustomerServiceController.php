<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerServiceController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware(['auth:customer_service']);
    }


    public function index_guard(){
        if (logged_in()) {
            $users=User::whereNotIn('account_id', ['manager','customer_service'])->orderByDesc('created_at')->get();
            return view('customer_service.users_approve')->with(['users'=>$users]);

        }
        else {
            return view('user.select');
        }
    }



}
