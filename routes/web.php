<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('Post')->prefix('post')->name('post.')->group(function(){

    Route::get('/create', [PostController::class, 'create'])->name('createPost');
    Route::post('/create', [PostController::class, 'store'])->name('storePost');

    Route::get('/', [PostController::class, 'index'])->name('getAll');
    Route::get('/{id}', [PostController::class, 'show'])->name('getById');
    Route::delete('/{id}', [PostController::class, 'destroy'])->name('deletePost');
    
    Route::get('edit/{id}', [PostController::class, 'edit'])->name('editPost');
    Route::put('update/{id}', [PostController::class, 'update'])->name('updatePost');

});
