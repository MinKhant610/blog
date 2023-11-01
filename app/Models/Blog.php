<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Blog
{
    public $title, $slug, $intro, $body;
    public function __construct($title, $slug, $intro, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->intro = $intro;
        $this->body = $body;
    }
    public static function find($slug){
        // $path = "../resources/blogs/$slug.html";
        $path = resource_path("blogs/$slug.html");
        if(!file_exists($path)){
            abort(404);
        }
        return cache()->remember("posts.$slug", now()->addMinutes(2), function() use ($path){
            return file_get_contents($path);
        });
    }

    public static function all(){
        return collect(File::files(resource_path('blogs')))->map(function($file){
            $obj = YamlFrontMatter::parseFile($file);
            return new Blog($obj->title, $obj->slug, $obj->intro, $obj->body());
        });
    }
}
