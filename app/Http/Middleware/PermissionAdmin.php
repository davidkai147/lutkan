<?php

namespace App\Http\Middleware;

use App\Constants\AppConstants;
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
        $userRole = auth()->user()->getRoleNames()->first();
        $firstSegment = $request->segment(1);
        if ($firstSegment !== CONST_ADMIN_PREFIX && $userRole == AppConstants::ROLE_SUPER_ADMIN) {
            abort(403, 'Bạn không có quyền truy cập');
        }
        return $next($request);
    }
}

// news/login
