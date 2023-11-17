<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{

    public function index() {
        return view('blogs.index', [
            'blogs' => Blog ::latest()
            ->filter(request(['search', 'category', 'username']))
            ->paginate(6)
            ->withQueryString()
        ]);
    }

    public function show(Blog $blog) {
        return view ('blogs.show', [
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
        ]);
    }

    //for admin
    public function create(){
        return view('blogs.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(){
        $formData = request()->validate([
            "title" => ['required'],
            "slug" => ['required', Rule::unique('blogs', 'slug')],
            "intro" => ['required'],
            "body" => ['required'],
            "category_id" => ['required', Rule::exists('categories', 'id')]
        ]);
        $formData['user_id'] = auth()->id();
        Blog::create($formData);
        return redirect('/');
    }

}
