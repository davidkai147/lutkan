<?php

use App\Constants\AppConstants;
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
$prefixAdmin = CONST_ADMIN_PREFIX;
Route::group(['prefix' => $prefixAdmin, 'namespace' => 'Admin', 'middleware' => ['role:' . AppConstants::ROLE_SUPER_ADMIN]], function () use ($prefixAdmin) {

    // ====================== HOME ========================
    $prefix = 'home';
    $controllerName = 'home';
    $controller = ucfirst($controllerName) . 'Controller@';
    Route::group(['prefix' => $prefix], function () use ($prefix, $controller, $prefixAdmin) {
        Route::get( '/', ['as' => $prefixAdmin . '.home', 'uses' => $controller . 'index']);
    });
});
