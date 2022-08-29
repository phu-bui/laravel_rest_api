<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\PostController;

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

//Admin
Route::namespace('Admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        //login route
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLogin');
        Route::post('login', [LoginController::class, 'login'])->name('login');
        //register route
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('showRegister');
        Route::post('register', [RegisterController::class, 'register'])->name('register');
        
    //     Route::middleware('admin')->group(function(){
    //         Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //     });
    });
    Route::middleware('admin')->group(function(){
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        });
    
    // Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');



    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return view('admin.welcome');
    });

    Route::namespace('Post')->middleware('admin')->prefix('post')->group(function(){

        Route::get('/create', [PostController::class, 'create'])->name('createPost');
        Route::post('/create', [PostController::class, 'store'])->name('storePost');
    
        Route::get('/', [PostController::class, 'index'])->name('getAllPost');
        Route::get('/{id}', [PostController::class, 'show'])->name('getPostById');
        Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('deletePost');
        
        Route::get('edit/{id}', [PostController::class, 'edit'])->name('editPost');
        Route::put('update/{id}', [PostController::class, 'update'])->name('updatePost');
    
    });
});
