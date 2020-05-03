<?php


namespace App\Http\Controllers\User;


use App\Constants\AppConstants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProjectController extends Controller
{

    protected $title;

    public function __construct()
    {
        $this->title = 'Project';
        View::share([
            'title' => $this->title,
            'constants' => AppConstants::class
        ]);
    }

    public function index(Request $request)
    {
        return response()->view('projects.index');
    }
}
