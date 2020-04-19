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
        $userInfo = auth()->user();
        if(!empty($userInfo)) {
            if ($userInfo['account_type'] == 'admin') {
                return redirect()->route('admin.home');
            }
        }

        return $next($request);
    }
}

// news/login