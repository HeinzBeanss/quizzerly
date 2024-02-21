<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
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

    public function update()
    {
        request()->validate([
            'profile_picture' => 'required|image|max:2048|dimensions:min_width=100,min_height=100',
        ], [
            'profile_picture.required' => 'No profile picture chosen.',
            'profile_picture.image' => 'The profile picture must be an image.',
            'profile_picture.max' => 'The profile picture must not be larger than :max kilobytes.',
            'profile_picture.dimensions' => 'The profile picture dimensions must be between 200x200 and 1000x1000 pixels.',
        ]);

        $storedFilePath = request()->file('profile_picture')->store('profile_pictures');
        $filename = basename($storedFilePath);

        // ignore error, IDE issue
        auth()->user()->update(['profile_picture' => $filename]);

        return redirect()->back()->with('success', 'Profile picture updated successfully!');
    }

    public function delete(User $user)
    {
        if ($user->id === auth()->user()->id) {
            return view('register.delete');
        } else {
            return back()->with('success', 'Oops! I don\'t think you have permission for that.');
        }
    }

    public function destroy(User $user)
    {
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
