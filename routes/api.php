<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(array(
    'middleware' => 'api',
    'prefix' => 'auth'
), function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::group(['prefix'=>'fruits'], function (){
            Route::get('/', \App\Http\Controllers\Fruit\IndexController::class );
        });
    });
});

Route::group(['prefix'=>'users'], function (){
    Route::post('/', \App\Http\Controllers\User\StoreController::class );
});


