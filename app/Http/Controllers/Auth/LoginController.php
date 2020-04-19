<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if ($request->isMethod('post')) {
            $params = $request->all();
            $userModel = new User();
            $userInfo = ['email' => $params['email'], 'password' => $params['password']];

            if (!auth()->attempt($userInfo, $request->get('remember_me'))) {
                return redirect()->route('login')->with('app_error', 'Tài khoản hoặc mật khẩu không chính xác!');
            } else {
                return redirect()->route('admin.home');
            }
        }
    }

    public function logout(Request $request)
    {
        // clear user info session
        //user_clear_info();
        auth()->logout();
        return redirect()->route('login');
    }
}
