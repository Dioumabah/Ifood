<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('utype') === 'ADMIN') {
            return $next($request);
        } elseif (session('utype') === 'RESTO') {
            return $next($request);
        } elseif (session('utype') === 'VISIT') {
            return $next($request);
        } elseif (session('utype') === 'LIV') {
            return $next($request);
        } else {
            session()->flush();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
