<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->email == 'erfanwmb@gmail.com' || Auth::user()->email == 'Aryadoorsam@gmail.com' || Auth::user()->is_staffUser())  return $next($request);
        else abort(403,'You aren\'t Manager');
    }
}
