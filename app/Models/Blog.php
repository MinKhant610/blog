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
            $query->where('title', 'LIKE', '%'.$search.'%')
                  ->orWhere('body', 'LIKE', '%'.$search.'%');
        });
    }
}


