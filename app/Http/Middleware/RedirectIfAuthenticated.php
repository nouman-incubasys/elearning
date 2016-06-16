<?php

namespace App\Http\Middleware;

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
        if (Auth::guard($guard)->check()) {
//            if(Auth::user()->usergroups_id ==1){
//                return 'Super Admin';
//            }else if(Auth::user()->usergroups_id ==2){
                return redirect('/');
//            }else{
//                return 'App User';
//            }
            
        }

        return $next($request);
    }
}
