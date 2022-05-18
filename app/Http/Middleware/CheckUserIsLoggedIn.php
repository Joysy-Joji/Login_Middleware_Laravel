<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserIsLoggedIn
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
//$route = $request->route()->getName('web.login.show','web.register.show');
//if(Auth::check()){
//    in_array([
//        redirect()->route('web.dashboard')
//    )]
//}
//else{
//    return $next($request);
//}



        if(Auth::check()){

            return $next($request);
        }else{
            return  redirect()->route('web.login.show');
        }

    }
}
