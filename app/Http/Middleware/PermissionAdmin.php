<?php

namespace App\Http\Middleware;

use App\Constants\AppConstants;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class PermissionAdmin extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
//        dd(auth($guard)->user());
//
//        if (!empty(auth()->user())) {
//            $userRole = auth()->user()->getRoleNames()->first();
//            $firstSegment = $request->segment(1);
//            if ($firstSegment !== CONST_ADMIN_PREFIX && $userRole == AppConstants::ROLE_SUPER_ADMIN) {
//                abort(403, 'Bạn không có quyền truy cập');
//            }
//            return $next($request);
//        } else {
//            return redirect()->route('login');
//        }

    }
}

// news/login
