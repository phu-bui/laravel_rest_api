<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\NotiTemplateController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
use App\Models\NotiTemplate;

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

Route::namespace('Admin')->name('admin.')->middleware('guest:admin')->group(function(){

        //login route
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLogin');
        Route::post('login', [LoginController::class, 'login'])->name('login');
        //register route
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('showRegister');
        Route::post('register', [RegisterController::class, 'register'])->name('register');
});

Route::namespace('Admin')->name('admin.')->middleware('admin')->group(function(){
        
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('admin.welcome');
    });

    Route::namespace('Auth')->prefix('user')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('getAllUser');
        Route::get('/sendmail/{email}', [UserController::class, 'sendMail'])->name('sendMail');
    });

    Route::namespace('Post')->prefix('post')->group(function(){

        Route::get('/create', [PostController::class, 'create'])->name('createPost');
        Route::post('/create', [PostController::class, 'store'])->name('storePost');
    
        Route::get('/', [PostController::class, 'index'])->name('getAllPost');
        Route::get('/{id}', [PostController::class, 'show'])->name('getPostById');
        Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('deletePost');
        
        Route::get('edit/{id}', [PostController::class, 'edit'])->name('editPost');
        Route::put('update/{id}', [PostController::class, 'update'])->name('updatePost');
    
    });

    //Notification
    Route::namespace('Notification')->prefix('notification')->group(function(){
        Route::get('send/{email}', [NotificationController::class, 'send'])->name('sendNotification');
    });

    Route::namespace('Noti Template')->prefix('noti-template')->group(function(){
        Route::get('/', [NotiTemplateController::class, 'index'])->name('getAllNotiTemplate');
        Route::get('/create', [NotiTemplateController::class, 'create'])->name('createNotiTemplate');
        Route::post('/create', [NotiTemplateController::class, 'store'])->name('storeNotiTemplate');

        Route::get('edit/{id}', [NotiTemplateController::class, 'edit'])->name('editNotiTemplate');
        Route::put('update/{id}', [NotiTemplateController::class, 'update'])->name('updateNotiTemplate');

        Route::get('/delete/{id}', [NotiTemplateController::class, 'destroy'])->name('deleteNotiTemplate');
    });
});
