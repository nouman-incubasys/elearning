<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ValidationMiddleware
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
        $header = apache_request_headers();
        if(!isset($header['Authorization']) || $header['Authorization'] == ""){
            return response('Authorization token not found', 401);
        }

        $user = User::where('access_token','=',$header['Authorization'])->first();
        if(!$user)
            return response('User not Authenticated.', 401);

        return $next($request);
    }
}
