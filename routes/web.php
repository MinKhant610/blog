<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', [BlogController::class, 'index']);
//                    wildcard          wildcard parm
Route :: get ('/blogs/{blog:slug}', [BlogController::class, 'show'])-> where('blog', '[A-Za-z\d\-_]+');
