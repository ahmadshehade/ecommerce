<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BasketAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $user=auth('web')->user();
         $profile=$user->profile;
         if(!$profile){
            return redirect()->route('createprofile')->with('error','No Profile For This User Please Create One');
         }

     
         else{
            return $next($request);
         }


    }
}
