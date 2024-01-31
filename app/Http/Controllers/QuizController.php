<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('quizzes.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {
        // store the quiz
        // dd(request());

        $quizAttributes = request()->validate([
            'name' => 'required|max:255|unique:quizzes,name',
            'thumbnail' => 'image',
            'description' => 'required|max:255',
            'category_id' => 'required|numeric',
        ]);

        // file needs properly storing.

        $quizAttributes['user_id'] = auth()->user()->id;
        $quizAttributes['slug'] = Str::slug($quizAttributes['name']);
        $quizAttributes['thumbnail'] = request()->file('thumbnail')->store('quizzes');

        $quiz = Quiz::create($quizAttributes);

        foreach (request('question') as $i => $requestQuestion) {

            request()->validate([
                "question.$i.0" => 'string|required',
            ], [
                "question.$i.0.required" => "The question is required.",
                "question.$i.0.string" => "The question must be a string.",
            ]);


            $questionAttributes['quiz_id'] = $quiz->id;
            $questionAttributes['name'] = $requestQuestion[0];

            $question = Question::create($questionAttributes);

            foreach ($requestQuestion as $j => $requestAnswer) {

                request()->validate([
                    "question.$i.$j" => 'string|required',
                ], [
                    "question.$i.$j.required" => "The answer is required.",
                    "question.$i.$j.string" => "The answer must be a string.",
                ]);

                if ($j === 0) {
                    continue;
                }

                if ($j === 1) {
                    $answerAttributes['is_correct'] = true;
                } else {
                    $answerAttributes['is_correct'] = false;
                }

                $answerAttributes['question_id'] = $question->id;
                $answerAttributes['name'] = $requestAnswer;

                Answer::create($answerAttributes);
            }
        };

        return redirect("/quizzes/$quiz->slug");
        // maybe add with a success message: Quiz successfully created.

    }

    // new quiz to database, with 
    // slug DONE
    // description DONE
    // name DONE
    // user DONE
    // category DONE

    // then for each question, in the loop, CREATE A QUESTION  
    // attach that quiz->id to the quiz
    // then the first item in the array value is the name

    // then, loop again, for each item in the question array EXCEPT the first one, CREATE AN ANSWER
    // the question->id = question_id
    // if the index = 1 then answer is correct
    // then the name ist he value of the key in the array.

    // save them all, all good.



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
