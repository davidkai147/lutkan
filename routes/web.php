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
$prefixUser = CONST_USER_PREFIX;
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

Route::group(['namespace' => 'User', 'middleware' => ['permission.admin']], function () use ($prefixUser) {
    // ====================== HOME ========================
    $prefix = 'home';
    $controllerName = 'home';
    $controller = ucfirst($controllerName) . 'Controller@';
    Route::group(['prefix' => $prefix], function () use ($prefix, $controller, $prefixUser) {
        Route::get( '/', ['as' => $prefixUser . '.home', 'uses' => $controller . 'index']);
    });

});
