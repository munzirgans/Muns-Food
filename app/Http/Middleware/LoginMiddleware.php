<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class LoginMiddleware
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
        if(!Session::has("user")){
            return redirect()->route("login.index");
        }
        return $next($request);
    }
}
