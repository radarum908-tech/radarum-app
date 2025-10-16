<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsTamu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            switch (Auth::user()->role) {
                case 'admin':
                    return redirect('/admin')->with('success', 'Kamu sudah login sebagai admin');
                case 'reviewer':
                    return redirect('/reviewer')->with('success', 'Kamu sudah login sebagai reviewer');
                case 'kampus':
                    return redirect('/kampus')->with('success', 'Kamu sudah login sebagai kampus');
                default:
                    Auth::logout();
                    return redirect('/login')->with('error', 'Role tidak dikenali');
            }
        }
    return $next($request);
    }
}