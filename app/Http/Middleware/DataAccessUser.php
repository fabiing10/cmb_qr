<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DataAccessUser
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
        $userType = Auth::user()->userType;
        if($userType == "user"){
            return $next($request);
        }else if($userType == "super-admin"){
            return redirect("/control");
        }else if($userType == "admin"){
            return redirect("/administrator");
        }else{
            return redirect("/logout");
        }
    }
}
