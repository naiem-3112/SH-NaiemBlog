<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.category.index', compact('categories'));

    }

    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
        ]);
        Session::flash('success', 'category created successfully');

        return redirect()->back();
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
           'name' => 'required|unique:categories,name,$category->name'
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $category->save();

        Session::flash('success', 'Category Updated Successfully');
        return redirect()->back();
    }


    public function destroy(Category $category)
    {
        if($category){
            $category->delete();

            Session::flash('success', 'Category Deleted Successfully');
            return redirect()->route('category.index');
        }
    }
}
