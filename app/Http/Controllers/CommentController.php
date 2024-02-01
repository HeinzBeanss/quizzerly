<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(Quiz $quiz) {
        
        request()->validate([
            'body' => 'required'
        ]);

        $quiz->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back()->with('success', 'Comment successfully posted.');
    }

}
