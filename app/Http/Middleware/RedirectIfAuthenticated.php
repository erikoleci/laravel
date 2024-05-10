<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if ($guard == "starter" && Auth::guard($guard)->check()) {
            return redirect('/starter');
        }
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }

        if ($guard == "manager" && Auth::guard($guard)->check()) {
            return redirect('/manager');
        }

        if ($guard == "officemanager" && Auth::guard($guard)->check()) {
            return redirect('/officemanager');
        }

        if ($guard == "teamleader" && Auth::guard($guard)->check()) {
            return redirect('/teamleader');
        }

        if ($guard == "affiliator" && Auth::guard($guard)->check()) {
            return redirect('/affiliator');
        }

        return $next($request);
    }
}
