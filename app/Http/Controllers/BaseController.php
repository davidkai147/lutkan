<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $adminViewPath = 'admin';
    protected $title = '';
}
