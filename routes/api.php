<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserAuthController;

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

Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);

Route::prefix('/v1')->middleware('auth:api')->group(function () {
   Route::get('/user', [UserAuthController::class, 'userInfo'])->middleware('checkAdmin:api');
   Route::put('/user/{id}', [UserAuthController::class , 'update'])->middleware('checkUser:api');
   Route::delete('/user/{id}', [UserAuthController::class , 'delete']);
});

