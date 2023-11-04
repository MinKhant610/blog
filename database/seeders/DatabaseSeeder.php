<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Blog::truncate();
        Category::truncate();
        User::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $frontend = Category::create([
            'name' => 'frontend',
            'slug' => 'frontend'
        ]);

        $backend = Category::create([
            'name' => 'backend',
            'slug' => 'backend'
        ]);

        Blog::create([
            'title' => 'frontend post',
            'slug' => 'frontend-post',
            'intro' => 'this is frontend intro',
            'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione voluptates voluptas non tenetur quaerat deserunt, temporibus quos fugit earum, dignissimos quas iste animi ut itaque fuga repudiandae quis asperiores magnam?",
            'category_id' => $frontend->id
        ]);

        Blog::create([
            'title' => 'backend post',
            'slug' => 'backend-post',
            'intro' => 'this is backend intro',
            'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione voluptates voluptas non tenetur quaerat deserunt, temporibus quos fugit earum, dignissimos quas iste animi ut itaque fuga repudiandae quis asperiores magnam?",
            'category_id' => $backend->id
        ]);
    }
}
