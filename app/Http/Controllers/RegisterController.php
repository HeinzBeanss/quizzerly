<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {

        return view('register.create');

    }

    public function store() 
    {
        $user = User::create(request()->validate([
            'username' => 'required|unique:users,username|max:255',
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|min:3|max:255|unique:users,email',
            'password' => 'required|min:6',
        ]));

        auth()->login($user);
        return redirect('/')->with('success', 'Your account has been created.');
    }

    public function delete(User $user) {

        if ($user->id === auth()->user()->id) {
            return view('register.delete');  
        } else {
            return back()->with('success', 'Oops! I don\'t think you have permission for that.');
        }
          
    }

    public function destroy(User $user) {

        if ($user->id === auth()->user()->id) {
        // log out + delete user.
        auth()->logout();
        $user->delete();

        return redirect('/')->with('success', 'Your account has been deleted');
        } else {
            return back()->with('success', 'Oops! I don\'t think you have permission for that.');
        }
    }
}
