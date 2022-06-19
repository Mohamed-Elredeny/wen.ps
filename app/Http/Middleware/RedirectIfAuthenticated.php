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
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }

        if ($guard == "company_general_manager" && Auth::guard($guard)->check()) {
            return redirect()->route('company_general_manager.dashboard');
        }

        if ($guard == "quality_manager" && Auth::guard($guard)->check()) {
            return redirect()->route('quality_manager.dashboard');
        }

        if ($guard == "clean_mantanance_manager" && Auth::guard($guard)->check()) {
            return redirect()->route('clean_mantanance_manager.dashboard');
        }

        if ($guard == "supervisor" && Auth::guard($guard)->check()) {
            return redirect()->route('supervisor.dashboard');
        }

        if ($guard == "employee" && Auth::guard($guard)->check()) {
            return redirect()->route('employee.dashboard');
        }

        if ($guard == "web" && Auth::guard($guard)->check()) {
            return redirect()->route('home');
        }

        if ($guard == "restaurant" && Auth::guard($guard)->check()) {
            return redirect('/restaurant');
        }

        if ($guard == "hotel" && Auth::guard($guard)->check()) {
            return redirect('/hotel');
        }

        if ($guard == "resort" && Auth::guard($guard)->check()) {
            return redirect('/resort');
        }

        if ($guard == "visitor" && Auth::guard($guard)->check()) {
            return redirect('/');
        }

        if ($guard == "") {
            return redirect('user-login');
        }

        return $next($request);
    }
}