<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show() {
        
        return view('profile.show', [
            'quizzes' => Quiz::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
