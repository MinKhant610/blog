<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', [BlogController::class, 'index']);
//                    wildcard          wildcard parm
Route :: get ('/blogs/{blog:slug}', [BlogController::class, 'show'])-> where('blog', '[A-Za-z\d\-_]+');

Route::get('/register',[AuthController::class, 'create'])->middleware('guest');
Route::post('/register',[AuthController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');
