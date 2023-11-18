<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index(){
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->paginate(6)
        ]);
    }

    public function create(){
        return view('admin.blogs.create', [
            'categories' => Category::all()
        ]);
    }

    public function destroy(Blog $blog){
        $blog->delete();
        return back();
    }

    public function edit(Blog $blog){
        return view('admin.blogs.edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    public function update(Blog $blog){
        $formData = request()->validate([
            "title" => ["required"],
            "slug" =>  ["required", Rule::unique('blogs', 'slug')->ignore($blog->id)],
            "intro" =>  ["required"],
            "body" =>  ["required"],
            "category_id" =>  ["required", Rule::exists('categories', 'id')],
            "thumbnail" => ['image','mimes:jpeg,png,jpg,gif','max:2048']
        ]);
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = request()->file('thumbnail') ?
            request()->file('thumbnail')->store('thumbnails') : $blog->thumbnail;
        $blog->update($formData);
        return redirect('/admin/blogs');
    }

    public function store(){
        // $path = request()->file('thumbnail')->store('thumbnails'); => is can pass backend validate so not use
        $file = request()->file('thumbnail');
        $extension = $file->getClientOriginalExtension();

        // Validate file type
        request()->validate([
            "thumbnail" => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Check file extension separately
        if (!in_array(strtolower($extension), ['jpeg', 'jpg', 'png', 'gif'])) {
            // Handle the case where the file extension is not allowed
            return redirect()->back()->withErrors(['thumbnail' => 'Only JPEG, PNG, JPG, and GIF images are allowed.']);
        }

        $path = $file->store('thumbnails');

        $formData = request()->validate([
            "title" => ['required'],
            "slug" => ['required', Rule::unique('blogs', 'slug')],
            "intro" => ['required'],
            "body" => ['required'],
            "category_id" => ['required', Rule::exists('categories', 'id')],
            "thumbnail" => ['image','mimes:jpeg,png,jpg,gif','max:2048']
        ]);
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = $path;
        Blog::create($formData);
        return redirect('/');
    }
}
