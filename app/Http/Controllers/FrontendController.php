<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $posts = Post::with('category')->orderBy('created_at', 'DESC')->take(5)->get();
//        header sticky post
        $first_two_post = $posts->splice(0, 2);
        $second_one_post = $posts->splice(0, 1);
        $third_two_post = $posts->splice(0, 2);
//        recent post
        $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);
        $footer_posts = Post::with('category')->inRandomOrder()->take(4)->get();
//        footer sticky post
        $footer_first_post = $footer_posts->splice(0, 1);
        $footer_middle_post = $footer_posts->splice(0, 1);
        $footer_third_post = $footer_posts->splice(0, 2);
        return view('front_temp.home', compact('posts', 'recentPosts', 'first_two_post', 'second_one_post', 'third_two_post', 'footer_first_post', 'footer_middle_post', 'footer_third_post'));
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
