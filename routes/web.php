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
        'blogs' => Blog ::latest()->get(),
        'categories' => Category :: all(),
    ]);
});
//                    wildcard          wildcard parm
Route :: get ('/blogs/{blog:slug}', function (Blog $blog) {
    return view ('blog', [
        'blog' => $blog,
        'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
    ]);
})-> where('blog', '[A-Za-z\d\-_]+');

Route :: get ('/categories/{category:slug}', function (Category $category){
    return view('blogs', [
        'blogs' => $category->blogs,
        'categories' => Category :: all(),
        'currentCategory' => $category
    ]);
});

Route :: get ('/users/{user:username}', function (User $user){
    return view('blogs', [
        //lazy loading
        //when one bject has many blogs
        // 'blogs' => $author->blogs->load('author','category')
        'blogs' => $user->blogs,
        'categories' => Category :: all()
    ]);
});
