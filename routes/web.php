<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

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
    return view('blogs', [
        'blogs' => Blog ::latest()->get()
    ]);
});
//                    wildcard          wildcard parm
Route :: get ('/blogs/{blog:slug}', function (Blog $blog) {
    return view ('blog', [
        'blog' => $blog
    ]);
})-> where('blog', '[A-Za-z\d\-_]+');

Route :: get ('/categories/{category:slug}', function (Category $category){
    return view('blogs', [
        'blogs' => $category->blogs
    ]);
});

Route :: get ('/users/{user:username}', function (User $user){
    return view('blogs', [
        //lazy loading
        //when one bject has many blogs
        // 'blogs' => $author->blogs->load('author','category')
        'blogs' => $user->blogs
    ]);
});
