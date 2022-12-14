<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\UserLoginController;

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
    return view('home');
});
Route::get('/login', [UserLoginController::class, 'index']);
Route::post('/login', [UserLoginController::class, 'loginUser']);

Route::get('/user/register', [UserRegisterController::class, 'index'])->name('user.create');
Route::post('/user/register', [UserRegisterController::class, 'register']);
// Route::post('/register', 'App\Http\Controllers\UserRegisterController@register'); // another way of above route

Route::get('/user/view', [UserRegisterController::class, 'view'])->name('user.view');
Route::get('/user/delete/{id}', [UserRegisterController::class, 'delete'])->name('user.delete');
Route::get('/user/update/{id}', [UserRegisterController::class, 'update'])->name('user.update');
Route::post('/user/update/{id}', [UserRegisterController::class, 'updateData']);