<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

Route::get('/', [BlogController::class, 'index']);
//                    wildcard          wildcard parm
Route :: get ('/blogs/{blog:slug}', [BlogController::class, 'show'])-> where('blog', '[A-Za-z\d\-_]+');

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
