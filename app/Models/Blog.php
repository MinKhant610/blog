<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    //when we use Blog::create([])
    protected $fillable =['title', 'intro', 'body'];
    // protected $guarded = ['id']; 
}


