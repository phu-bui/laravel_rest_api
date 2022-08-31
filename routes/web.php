<?php

use App\Http\Controllers\Auth\GoogleSocialiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirect', [GoogleSocialiteController::class, 'redirectToProvider'])->name('loginGoogle');
Route::get('/callback', [GoogleSocialiteController::class, 'handleProviderCallback']);

Auth::routes(['verify' => true]);

Route::get('/home', [PostController::class, 'index'])->name('home')->middleware('verified');
Route::get('/create', [PostController::class, 'create'])->middleware('auth')->name('post.createPost');

Route::namespace('Post')->prefix('post')->name('post.')->group(function(){
    Route::get('/{id}', [PostController::class, 'show'])->name('getById');

    Route::middleware('auth')->group(function(){
        Route::post('update/{id}', [PostController::class, 'update'])->name('updatePost');
        Route::delete('/{id}', [PostController::class, 'destroy'])->name('deletePost');
        Route::post('/create', [PostController::class, 'store'])->name('storePost');
        Route::get('edit/{id}', [PostController::class, 'edit'])->name('editPost');
    });
});
