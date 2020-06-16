<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            'image' => 'required|image|max:5000',
            'description' => 'required',
            'category_id' => 'required'
        ]);


        if ($request->has('image')) {
            $image = $request->image;
            $imageUniqueName = time() . '.' . $image->extension();
            $image->move(public_path('back_temp/dist/postImages'), $imageUniqueName);

            $post = Post::create([
                'title' => $request->title,
                'image' => $imageUniqueName,
                'slug' => Str::slug($request->title, '-'),
                'description' => $request->description,
                'user_id' => auth()->id(),
                'published_at' => Carbon::now(),
                'category_id' => $request->category_id,
            ]);
            Session::flash('success', 'Post created Successfully');
            return redirect()->back();
        }
    }

    public function show(Post $post)
    {

    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
