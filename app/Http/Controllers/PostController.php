<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            'image' => 'required|image|max:5000',
            'description' => 'required',
            'category_id' => 'required'
        ]);


        if ($request->hasFile('image')) {
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
            $post->tags()->attach($request->tags);

            Session::flash('success', 'Post created Successfully');
            return redirect()->back();
        }
    }

    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => "required|unique:posts,title, $post->id",
            'description' => 'required',
            'category_id' => 'required'
        ]);

            $post->title =  $request->title;
            $post->slug = Str::slug($request->title, '-');
            $post->description = $request->description;
            $post->category_id = $request->category_id;

            $post->tags()->sync($request->tags);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageUniqueName = time() . '.' . $image->extension();
            $image->move(public_path('back_temp/dist/postImages'), $imageUniqueName);
            $post->image = $imageUniqueName;
        }

            $post->save();

            Session::flash('success', 'Post updated Successfully');
            return redirect()->back();

    }

    public function destroy(Post $post)
    {
        if($post){
            file::delete(public_path('back_temp/dist/postImages/'.$post->image));
            $post->delete();
            Session::flash('success', 'post deleted successfully');
        }
        return redirect()->back();
    }
}
