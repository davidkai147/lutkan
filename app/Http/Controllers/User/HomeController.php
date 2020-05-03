<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\API\ApiBaseController;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class HomeController extends ApiBaseController
{
    private $moduleViewPath = '';
    /**
     * @var string
     */
    private $title;

    /**
     * HomeController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->title = 'Dashboard';
        View::share([
            'title' => $this->title,
            'constants' => $this->constants
        ]);
    }

    /**
     * @return Response
     */
    public function index()
    {

        return response()->view('home.index');
    }
}
