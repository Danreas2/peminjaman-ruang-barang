<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class KaryawanMiddleware
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
        if (Auth::check() && Auth::user()->isKaryawan()) {
            return $next($request);    
        }

        return abort(403);
    }
}
