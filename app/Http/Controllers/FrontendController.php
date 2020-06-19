<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('created_at', 'DESC')->take(5)->get();
        $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);
        return view('front_temp.home', compact('posts', 'recentPosts'));
    }

    public function about()
    {
          return view('front_temp.about');
    }

    public function category()
    {
        return view('front_temp.category');
    }

    public function contact()
    {
        return view('front_temp.contact');
    }


    public function post($slug)
    {
        $post = Post::with('category')->where('slug', $slug)->first();
        if($post){
            return view('front_temp.post', compact('post'));
        }
        else{
            return redirect('/');
        }
    }

}
