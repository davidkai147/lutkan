<?php


namespace App\Http\Controllers\API;

use App\Transformers\UserTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Tymon\JWTAuth\Contracts\Providers\JWT;

class ProjectController extends ApiBaseController
{
    protected $jwt;

    /**
     * @var string
     */
    private $title;

    /**
     * HomeController constructor.
     * @param JWT $jwt
     * @param Request $request
     */
    public function __construct(JWT $jwt, Request $request)
    {
        parent::__construct($request);
        $this->middleware('permission.admin:user');
        $this->title = 'Project';
        $this->jwt = $jwt;
        View::share([
            'title' => $this->title,
            'constants' => $this->constants
        ]);
    }

    /**
     * @return Response
     */
    public function index(Request $request)
    {
        dd($request->header('token'));
        return response()->view('projects.index');
    }
}
