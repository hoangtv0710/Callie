<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLoginAdmin
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
        if(Auth::check() && Auth::user()->role != 0 && Auth::user()->status == 1){
            return $next($request);
        } else {
            return redirect()->route('admin.login');
        }
    }
}
