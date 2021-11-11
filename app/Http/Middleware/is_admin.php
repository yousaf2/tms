<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class is_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        echo 'yes';
        // if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_role !=0){
        //     return redirect('/login');      
        // }
        // return $next($request);
    }
}
