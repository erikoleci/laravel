<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            foreach (['web', 'admin', 'manager', 'affiliator', 'officemanager', 'caposala', 'customer_service', 'teamleader', 'starter'] as $guard) {
                if (Auth::guard($guard)->check()) {
                    return $next($request);
                }
            }
            return redirect()->route('login');
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Customer's own profile/personal info page.
     */
    public function personal_info()
    {
        return view('user.personal_info');
    }

    /**
     * Customer's "make a deposit" page.
     */
    public function deposit()
    {
        return view('user.deposit');
    }

    /**
     * Customer's "request a withdrawal" page.
     */
    public function withdraw()
    {
        return view('user.withdraw');
    }

    /**
     * Redirect the logged-in user to the dashboard for whichever guard
     * they're authenticated on (admin / manager / affiliator / etc).
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index_guard()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home_dashboard');
        }
        if (Auth::guard('manager')->check()) {
            return redirect('/manager');
        }
        if (Auth::guard('affiliator')->check()) {
            return redirect('/affiliator');
        }
        if (Auth::guard('officemanager')->check()) {
            return redirect('/officemanager');
        }
        if (Auth::guard('caposala')->check()) {
            return redirect('/caposala');
        }
        if (Auth::guard('customer_service')->check()) {
            return redirect('/customer_service');
        }
        if (Auth::guard('teamleader')->check()) {
            return redirect('/teamleader');
        }

        return view('home');
    }
}
