<?php

namespace App\Http\Middleware;

use App\Constants\AppConstants;
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
            $userRoleName = $userInfo->getRoleNames()->first();
            if ($userRoleName == AppConstants::ROLE_SUPER_ADMIN) {
                return redirect()->route(CONST_ADMIN_PREFIX . '.home');
            } else {
                return redirect()->route(CONST_USER_PREFIX . '.home');
            }
        }

        return $next($request);
    }
}

// news/login
