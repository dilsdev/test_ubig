<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session::has('admin')){
            return redirect()->route('login');
        }
        if (Session::get('remember') && Session::get('expire')->isPast()) {
            Session::forget('admin');
            Session::forget('remember');
            Session::forget('expire');
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
