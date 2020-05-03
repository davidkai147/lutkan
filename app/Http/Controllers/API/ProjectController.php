<?php


namespace App\Http\Controllers\API;

use App\Services\ProjectService;
use App\Transformers\UserTransformer;
use Flugg\Responder\Http\Responses\SuccessResponseBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Throwable;
use Tymon\JWTAuth\Contracts\Providers\JWT;

class ProjectController extends ApiBaseController
{
    protected $jwt;
    protected $projectService;

    /**
     * HomeController constructor.
     * @param JWT $jwt
     * @param Request $request
     * @param ProjectService $projectService
     */
    public function __construct(JWT $jwt, Request $request, ProjectService $projectService)
    {
        parent::__construct($request);
        $this->projectService = $projectService;
        $this->jwt = $jwt;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function list(Request $request)
    {
        $title = "HDTuto.com";

        $view = view("projects.ajaxView",compact('title'))->render();

        return $this->successView($view);
    }
}
