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
$prefixAdmin = 'admin';
Route::group(['prefix' => $prefixAdmin, 'namespace' => 'Admin', 'middleware' => 'permission.admin'], function () use ($prefixAdmin) {

    // ====================== HOME ========================
    $prefix = '';
    $controllerName = 'home';
    $controller = ucfirst($controllerName) . 'Controller@';
    Route::group(['prefix' => $prefix], function () use ($prefix, $controller, $prefixAdmin) {
        Route::get( '/', ['as' => $prefixAdmin . '.home', 'uses' => $controller . 'index']);
    });
});
