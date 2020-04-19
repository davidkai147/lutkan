<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class HomeController extends BaseController
{
    private $moduleViewPath = '';

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->moduleViewPath .= $this->userViewPath . '.home';
        $this->title = 'Dashboard';
        View::share('title', $this->title);
    }

    /**
     * @return Response
     */
    public function index()
    {
        return response()->view($this->moduleViewPath . '.index');
    }
}
