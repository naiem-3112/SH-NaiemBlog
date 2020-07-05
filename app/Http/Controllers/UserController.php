<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        $user = new User();   
            $user->name = $request->name;
            $user->email = $request->email;
            $user->description = $request->description;
            $user->password = bcrypt($request->password);
            $user->save();
    
        Session::flash('success', 'user info stored successfully');
        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        return view('user.show');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => "required|unique:users,email, $user->id",
            'password' => 'sometimes|min:8'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;
        $user->password = bcrypt($request->password);
        $user->save();

        Session::flash('success', 'user info updated successfully');
        return redirect()->route('user.index');

    }

    public function destroy(User $user)
    {
        if($user){
            $user->delete();
            Session::flash('success', 'user info deleted successfully');
        }
        return redirect()->back();
    }
}
