<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::latest()->paginate(20);
        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'password' => bcrypt($request->password),
        ]);
        Session::flash('success', 'user info stored successfully');
        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        return view('user.show');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
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
