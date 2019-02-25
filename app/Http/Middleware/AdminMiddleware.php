<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        $user=Auth::User();

        if($user->email == 'admin@shells2k19' && $user->username == 'admin'){

            return $next($request);

        }
        else{

            Auth::logout();

        }
        
    }
}
