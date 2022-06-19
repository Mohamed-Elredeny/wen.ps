<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function checkGuard()
    {
        if(Auth::guard('apiEmployees')->check())
            {return Auth::guard('apiEmployees');}
        elseif(Auth::guard('apiSupervisors')->check())
            {return Auth::guard('apiSupervisors');}
        else {return 'false';}
        
    }

    public function handle($request, Closure $next)
    {
        if ($this->checkGuard() == 'false') {
            return 'false';
        }

        return $next($request);
    }
}
