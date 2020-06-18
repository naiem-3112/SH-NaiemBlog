<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('front_temp.home');
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

    public function post()
    {
        return view('front_temp.post');
    }

}
