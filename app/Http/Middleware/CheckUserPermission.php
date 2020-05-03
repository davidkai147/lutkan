<?php

namespace App\Http\Middleware;

use App\Constants\AppConstants;
use App\Models\User;
use App\Traits\HttpResponse;
use Closure;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class CheckUserPermission extends BaseMiddleware
{
    use HttpResponse;
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        if (!empty(auth()->user())) {
            $user = auth()->user();
            if ($user->can($permission)) {
                return $next($request);
            } else {
                return $this->unauthorized('unauthorized', 'Bạn không có quyền truy cập');
            }
        } else {
            return $this->forbidden('401', 'Vui lòng đăng nhập lại');
        }

    }
}

// news/login
