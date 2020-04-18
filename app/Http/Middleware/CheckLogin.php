<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        if(user()){

            $level = user()['level'];
            $route = $level == 'admin' ? config("priose.url.$level.prefix").'.dashboard' : 'home';
            return redirect()->route($route);
        }

        return $next($request);
    }
}

// news/login
