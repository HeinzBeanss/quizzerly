<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user) {
        
        return view('profile.show', [
            'user' => $user,
            'quizzes' => Quiz::where('user_id', $user->id)->latest()->paginate(8),
        ]);
    }
}
