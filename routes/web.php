<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegisterController;

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

Route::get('/about', function(){
    return view('about');
});
Route::get('/register', [UserRegisterController::class, 'index'])->name('user.create');
Route::post('/register', [UserRegisterController::class, 'register']);
Route::get('/user/view', [UserRegisterController::class, 'view'])->name('user.view');
Route::get('/user/delete/{id}', [UserRegisterController::class, 'delete'])->name('user.delete');
// Route::post('/register', 'App\Http\Controllers\UserRegisterController@register'); // another way of above route