<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (logged_in()) {
            $expiresAt = Carbon::now()->addSeconds(10);
            Cache::put('user-is-online-' . logged_in()->id, true, $expiresAt);
        }
        return $next($request);
    }
}
