<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        
        return view('quizzes.index', [
            'quizzes' => Quiz::all(),
        ]);
    }
}
