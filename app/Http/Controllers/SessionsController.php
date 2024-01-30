<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {

        return view('sessions/create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            return back()->withInput()->withErrors(['email' => 'Provided credentials could not be verified.']);
        }

        session()->regenerate();
        return redirect('/home')->with('success', 'Welcome back!');
    }

    public function destroy()
    {

        auth()->logout();
        return redirect('/home')->with('success', 'You\'ve been logged out.');
    }
}
