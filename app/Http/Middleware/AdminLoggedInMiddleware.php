<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoggedInMiddleware
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
         // Change this condition as per your requirement.
         if ( Auth::check() && Auth::user()->role === 'administrator' ) {
             return $next($request);
         }
         return redirect()->back();
     }
}
