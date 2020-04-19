<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Auth'], function () {
    // ====================== LOGIN ========================
    $prefix = '';
    $controllerName = 'login';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {

        Route::get('/', function() {
            return redirect('/login');
        });

        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get( '/login', ['as' => 'login', 'uses' => $controller . 'showLoginForm'])->middleware('check.login');
        Route::post( '/postLogin', ['as' => 'postLogin', 'uses' => $controller . 'login']);
        Route::get( '/logout', ['as' => 'logout', 'uses' => $controller . 'logout']);
    });
});
