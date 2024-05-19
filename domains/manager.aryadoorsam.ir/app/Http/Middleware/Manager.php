<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;


use Symfony\Component\HttpFoundation\Response;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
	
        if(Auth::user()->email=='morteza_yosefzade@yahoo.com' || Auth::user()->email== 'erfanwmb@gmail.com' || Auth::user()->email == 'Aryadoorsam@gmail.com')  return $next($request);
        Auth::logout();
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }
}
