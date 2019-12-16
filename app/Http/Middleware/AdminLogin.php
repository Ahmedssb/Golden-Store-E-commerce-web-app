<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   //determine if The user is logged in...
        if (!empty(Session::has('adminSession'))) {
            return $next($request);
          }
          return redirect()->route('AdminLog');
    }


}
