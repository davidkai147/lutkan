<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Constants\AppConstants as constants;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['middleware' => 'api'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout');
    });
});
Route::group(['middleware' => 'api'], function () {
    Route::namespace('API')->group(function () {
        Route::group(['prefix' => 'users'], function () {
            Route::post('info', 'UserController@info');
        });
        Route::group(['prefix' => 'projects'], function() {
            Route::post('list', 'ProjectController@list')->middleware("user.permission:" . constants::READ_PROJECTS);
        });
    });
});
