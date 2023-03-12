<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LoginMiddleware;

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


Route::get('/login/{erro?}',[UserController::class,'index'])->name('login.index');
Route::post('/login',[UserController::class,'auth'])->name('login.auth');
Route::get('/register',[UserController::class,'create'])->name('register.create');
Route::post('/register',[UserController::class,'store'])->name('register.store');

Route::middleware('auth')->prefix('/app')->group(function(){
    Route::get('/logout',[UserController::class,'logout'])->name('login.logout');
    Route::get('/home',[TaskController::class,'home'])->name('app.home');
    Route::resource('tasks',TaskController::class)->names([]);
});