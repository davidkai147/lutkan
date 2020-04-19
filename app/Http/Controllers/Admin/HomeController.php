<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\View;

class HomeController extends BaseController
{
    private $moduleViewPath = '';
    public function __construct()
    {
        $this->moduleViewPath .= $this->adminViewPath . '.home';
        $this->title = 'Dashboard';
        View::share('title', $this->title);
    }

    public function index()
    {
        return response()->view($this->moduleViewPath . '.index');
    }
}
