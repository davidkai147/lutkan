<?php

namespace App\Http\Controllers;

use App\Constants\AppConstants;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $adminViewPath = 'admin';
    protected $userViewPath = 'user';
    protected $title = '';

    public function __construct()
    {

    }
}
