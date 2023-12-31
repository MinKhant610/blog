<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    //lazy loading
    protected $with = ['category', 'author'];
    public function category(){
        //hasOne hasMany belongsTo belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, $filter){
        $query->when($filter['search']??false, function ($query, $search){
            $query->where(function($query) use ($search){
                $query->where('title', 'LIKE', '%'.$search.'%')
                      ->orWhere('body', 'LIKE', '%'.$search.'%');
            });
        });

        $query->when($filter['category']??false, function ($query, $slug){
                                                //this query is category query now
            $query->whereHas('category', function($query) use($slug){
                $query->where('slug', $slug);
            });
        });
        $query->when($filter['username']??false, function ($query, $username){
            $query->whereHas('author', function($query) use($username){
                $query->where('username', $username);
            });
        });

    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function subscribers(){
        //many to many relationship
        return $this->belongsToMany(User::class);
        //(User::class, 'blog_user') blog_user => table name
        // but we follow naming conversion so don't need second parm
    }

    public function unSubscribe(){
        $this->subscribers()->detach(auth()->id());
    }

    public function subscribe(){
        $this->subscribers()->attach(auth()->id());
    }
}

