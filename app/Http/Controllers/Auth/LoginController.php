<?php

namespace App\Http\Controllers\Auth;

use App\Constants\AppConstants;
use App\Http\Controllers\API\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends ApiBaseController
{
    protected $jwt;
    public function __construct(JWT $jwt, Request $request)
    {
        // $this->middleware('user', ['except' => ['login']]);
        $this->jwt = $jwt;
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
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        if ($request->isMethod('post')) {
            $user = User::first();

            $token = auth('api')->attempt($request->all());
            session(['Authorization' => $token]);
            return $this->success($user, new UserTransformer($token))->respond(JsonResponse::HTTP_OK);
        }
    }

    public function getinfo(Request $request)
    {
        dd(auth('api')->user());
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
