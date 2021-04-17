<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class LoggedMiddleware
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
        if(Session::has("user")){
            if(Session::get("user")->role_id == 1){
                return redirect()->route("admin.dashboard");
            }else if(Session::get("user")->role_id == 2){
                return redirect()->route('user.home');
            }else if(Session::get("user")->role_id == 3){
                return redirect()->route('courier.dashboard');
            }
        }
        return $next($request);
    }
}
