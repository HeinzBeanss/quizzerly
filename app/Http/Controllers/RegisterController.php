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
        return redirect('/home')->with('success', 'Your account has been created.');
    }
}
