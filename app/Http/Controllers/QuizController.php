<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {

        return view('quizzes.index', [
            'quizzes' => Quiz::with('questions', 'questions.answers', 'user')->get(),
            'categories' => Category::inRandomOrder()->get(),
        ]);
    }

    public function show(Quiz $quiz)
    {

        return view('quizzes.show', [
            'quiz' => Quiz::with([
                'questions.answers' => function ($query) {
                    $query->inRandomOrder();
                },
            ])->findOrFail($quiz->id),
        ]);
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function store()
    {
        // store the quiz
    }

    public function edit()
    {
        return view('quizzes.edit');
    }

    public function update(Quiz $quiz)
    {
        // update the quiz
    }

    public function destroy(Quiz $quiz)
    {
        // delete the quiz
    }

    public function random()
    {

        $randomQuiz = Quiz::inRandomOrder()->first();

        return redirect("/quizzes/$randomQuiz->slug");
    }

    public function complete()
    {

        $quiz = Quiz::with('questions', 'questions.answers')->findOrFail(request('quiz_id'));

        $correctAnswersScore = 0;
        $correctAnswersArray = [];
        $selectedAnswersArray = [];

        foreach ($quiz->questions as $question) {
            foreach ($question->answers as $answer) {

                // Get the selected answer,.
                $selectedAnswerId = request($question->id);
                $selectedAnswersArray[$question->id] = $selectedAnswerId;

                // If answer is correct, add it to the array for feedback
                if ($answer->is_correct) {
                    $correctAnswersArray[$question->id] = $answer->id;

                    // Compare the correct answer against the selected answer the user gave
                    if ($answer->id == $selectedAnswerId) {
                        $correctAnswersScore++;
                    }
                }
            }
        }
        // add an incrememt to the quiz.count or whatever it is.
        $percentage = ($correctAnswersScore > 0) ? ($correctAnswersScore / count($correctAnswersArray) * 100) : 0;

        $quiz->average_score = (($quiz->average_score * $quiz->times_taken) + $percentage) / ($quiz->times_taken + 1);

        $quiz->times_taken++;
        $quiz->save();

        return back()->with([
            'correctAnswers' => $correctAnswersArray,
            'selectedAnswers' => $selectedAnswersArray,
            'score' => $correctAnswersScore,
            'percentage' => $percentage,
        ]);
    }

    public function testt()
    {

        return view('quizzes.index');
    }
}
