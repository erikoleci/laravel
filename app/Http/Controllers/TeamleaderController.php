<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamleaderController extends Controller
{
  
    public function index()
    {
        if (logged_in()) {

            return redirect(get_guard().'/');

        }
        else {
            return view('auth.login_teamleader');
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
