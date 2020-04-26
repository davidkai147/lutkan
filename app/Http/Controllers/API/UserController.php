<?php


namespace App\Http\Controllers\API;

use App\Transformers\UserTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Providers\JWT;

class UserController extends ApiBaseController
{
    protected $jwt;
    public function __construct(JWT $jwt, Request $request)
    {
        parent::__construct($request);
        // $this->middleware('user', ['except' => ['login']]);
        $this->jwt = $jwt;
    }

    public function info(Request $request)
    {
        $user = auth('api')->user();
        if (!empty($user)) {
            $permissions = $user->getAllPermissions()->pluck('name');
            return $this->success($user, new UserTransformer($permissions))->respond(JsonResponse::HTTP_OK);
        } else {
            return $this->unauthorized('401', 'Khong dang nhap duoc');
        }
    }
}
