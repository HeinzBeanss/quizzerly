<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        
        return view('quizzes.index', [
            'quizzes' => Quiz::with('questions', 'questions.answers', 'user')->get(),
        ]);
    }

    public function show(Quiz $quiz) {

        return view('quizzes.show', [
            'quiz' => $quiz,
        ]);
    }

    public function create() {
        
        return view('quizzes.create');
    }

    public function store() {
        // store the quiz
    }

    public function edit() {
        return view('quizzes.edit');
    }

    public function update(Quiz $quiz) {
        // update the quiz
    }

    public function destroy(Quiz $quiz) {
        // delete the quiz
    }
}
