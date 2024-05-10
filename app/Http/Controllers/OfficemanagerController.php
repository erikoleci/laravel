<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class OfficemanagerController extends Controller
{
    public function index()
    {
        if (logged_in()) {

            return redirect(get_guard().'/');

        }
        else {
            return view('auth.login_office_manager');
        }
    }



    public function index_guard(){
        
        if (logged_in()) {
            return view('admin.users');
        }

        else {
            return view('user.select');
        }
    }




}
