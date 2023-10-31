<?php

use Illuminate\Support\Facades\Route;

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
    return view('blogs');
});
//                    wildcard          wildcard parm
Route :: get ('/blogs/{blog}', function ($slug) {
    $path = "../resources/blogs/$slug.html";
    if(!file_exists($path)){
        abort(404);
    }
    $blog = cache()->remember("posts.$slug", now()->addMinutes(2), function() use ($path){
        var_dump('file get contents');
        return file_get_contents($path);
    });
    
    return view ('blog', [
        'blog' => $blog
    ]);
})-> where('blog', '[A-Za-z\d\-_]+');