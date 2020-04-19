<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class PermissionAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userInfo = auth()->user();
        if (!empty($userInfo)) {
            if ($userInfo['account_type'] == 'admin') {
                return $next($request);
            }
            return redirect()->route('notify.noPermission');
        }

        return redirect()->route('login');
    }
}

// news/login
