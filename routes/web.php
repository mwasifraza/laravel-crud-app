<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserDashboardController;

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

Route::get('/', function(){ return view('home'); });

Route::controller(UserLoginController::class)->group(function(){
    Route::get('/login', 'index');
    Route::post('/login', 'loginUser');
    Route::get('/logout', 'logoutUser');
});

Route::controller(UserDashboardController::class)->group(function(){
    Route::get('/dashboard', 'index');
});

Route::prefix('user')->name('user.')->controller(UserRegisterController::class)->group(function(){
    Route::get('/register', 'index')->name('create');
    Route::post('/register', 'register');
    // Route::post('/user/register', 'App\Http\Controllers\UserRegisterController@register'); // another way of above route
    
    Route::get('/view', 'view')->name('view');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::get('/update/{id}', 'update')->name('update');
    Route::post('/update/{id}', 'updateData');
});