<?php

namespace App\Http\Controllers\Auth;

use App\Constants\AppConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{

    public function __construct()
    {
        View::share('title', 'Login');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        if ($request->isMethod('post')) {
            $params = $request->all();
            $userModel = new User();
            $userInfo = ['email' => $params['email'], 'password' => $params['password']];

            if (!auth()->attempt($userInfo, $request->get('remember_me'))) {
                return redirect()->route('login')->with('app_error', 'Tài khoản hoặc mật khẩu không chính xác!');
            } else {
                $userRoleName = auth()->user()->getRoleNames()->first();
                if ($userRoleName == AppConstants::ROLE_SUPER_ADMIN) {
                    return redirect()->route('admin.home');
                } else {
                    return redirect()->route('user.home');
                }
            }
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request)
    {
        // clear user info session
        //user_clear_info();
        auth()->logout();
        return redirect()->route('login');
    }
}
