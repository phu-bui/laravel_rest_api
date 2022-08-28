<?php

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

// Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
//     Route::namespace('Auth')->group(function(){
//         //login route
//         Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLogin');
//         Route::post('login', [LoginController::class, 'login'])->name('login');
//         //register route
//         Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('showRegister');
//         Route::post('register', [RegisterController::class, 'register'])->name('register');
//     });

//     Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');


//     Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
//     Route::get('/', function () {
//         return view('admin.welcome');
//     });
// });
