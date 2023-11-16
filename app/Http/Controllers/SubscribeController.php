<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscriptionHandler(Blog $blog){
        if(User::find(auth()->id())->isSubscribed($blog)){
            $blog->unSubscribe();
            return redirect('/blogs/'.$blog->slug);
        }else{
            $blog->subscribe();
            return redirect('/blogs/'.$blog->slug);
        }
    }
}
