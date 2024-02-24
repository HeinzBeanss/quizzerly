<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use OpenAI\Laravel\Facades\OpenAI;

class QuizController extends Controller
{
    public function home()
    {
        $featuredquiz = Quiz::where('created_at', '>=', Carbon::now()->subWeek())
                    ->orderBy('times_taken', 'desc')
                    ->first();
        if (!$featuredquiz) {
            $featuredquiz = Quiz::latest()->first();
        }

        return view('index', [
            'quizzes' => Quiz::with('user', 'category')->orderBy('created_at', 'desc')->take(7)->get(),
            'topquizzes' => Quiz::with('user', 'category')->orderBy('times_taken', 'desc')->take(5)->get(),
            'featuredquiz' => $featuredquiz,
            'categories' => Category::inRandomOrder()->get(),
        ]);
    }

    public function index()
    {
        return view('quizzes.index', [
            'quizzes' => Quiz::latest()->filter(request(['search']))->with('user', 'category')->paginate(7),
            'categories' => Category::inRandomOrder()->get(),
        ]);
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', [
            'quiz' => Quiz::with([
                'user',
                'questions.answers' => function ($query) {
                    $query->inRandomOrder();
                },
                'comments'
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
        $quizAttributes = request()->validate([
            'name' => 'required|max:64|unique:quizzes,name',
            'thumbnail' => 'image|max:2048|dimensions:min_width=720,min_height=400',
            'description' => 'required|max:255',
            'category_id' => 'required|numeric',
        ]);

        $quizAttributes['user_id'] = auth()->user()->id;
        $quizAttributes['slug'] = Str::slug($quizAttributes['name']);

        if (request('thumbnail') ?? false) {
            $quizAttributes['thumbnail'] = request()->file('thumbnail')->store('quizzes');
        }

        $quiz = Quiz::create($quizAttributes);

        foreach (request('question') as $i => $requestQuestion) {
            request()->validate([
                "question.$i.0" => 'string|required',
            ], [
                "question.$i.0.required" => 'The question is required.',
                "question.$i.0.string" => 'The question must be a string.',
            ]);

            $questionAttributes['quiz_id'] = $quiz->id;
            $questionAttributes['name'] = $requestQuestion[0];

            $question = Question::create($questionAttributes);

            foreach ($requestQuestion as $j => $requestAnswer) {
                request()->validate([
                    "question.$i.$j" => 'string|required',
                ], [
                    "question.$i.$j.required" => 'The answer is required.',
                    "question.$i.$j.string" => 'The answer must be a string.',
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

        return redirect("/quizzes/$quiz->slug")->with('success', 'Quiz successfully created.');
        // maybe add with a success message: Quiz successfully created.
    }

    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit', [
            'quiz' => $quiz,
            'categories' => Category::all(),
        ]);
    }

    public function update(Quiz $quiz)
    {
        $quizAttributes = request()->validate([
            'name' => "required|max:255|unique:quizzes,name,$quiz->id",
            'thumbnail' => 'image|max:2048|dimensions:min_width=720,min_height=400',
            'description' => 'required|max:255',
            'category_id' => 'required|numeric',
        ]);

        // $quizAttributes['user_id'] = auth()->user()->id;
        $quizAttributes['slug'] = Str::slug($quizAttributes['name']);

        if (request('thumbnail') ?? false) {
            $quizAttributes['thumbnail'] = request()->file('thumbnail')->store('quizzes');
        }

        $quiz->update($quizAttributes);
        $quiz->questions()->delete();

        foreach (request('question') as $i => $requestQuestion) {
            request()->validate([
                "question.$i.0" => 'string|required',
            ], [
                "question.$i.0.required" => 'The question is required.',
                "question.$i.0.string" => 'The question must be a string.',
            ]);

            $questionAttributes['quiz_id'] = $quiz->id;
            $questionAttributes['name'] = $requestQuestion[0];

            $question = Question::create($questionAttributes);

            foreach ($requestQuestion as $j => $requestAnswer) {
                request()->validate([
                    "question.$i.$j" => 'string|required',
                ], [
                    "question.$i.$j.required" => 'The answer is required.',
                    "question.$i.$j.string" => 'The answer must be a string.',
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

        return redirect('/users/' . auth()->user()->username . '/profile')->with('success', 'Quiz successfully updated.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect('/users/' . auth()->user()->username . '/profile');
    }

    public function random()
    {
        $randomQuiz = Quiz::inRandomOrder()->first();

        return redirect("/quizzes/$randomQuiz->slug");
    }

    public function popular()
    {
        return view('quizzes.popular', [
            'quizzes' => Quiz::with('user')->orderBy('times_taken', 'desc')->paginate(7),
            'categories' => Category::all(),
        ]);
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

    public function openai_create()
    {
        return view('quizzes.ai.create');
    }

    public function openai_store()
    {
        $numberOfQuestions = request('numberofquestions');
        $numberOfAnswers = request('answersperquestion');

        $quizTitlePrompt = 'Generate a simple quiz title based on the subject of: ' . request('subject');
        $quizTitleResponse = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => $quizTitlePrompt],
            ],
        ]);

        $quizDescPrompt = 'Generate a short description for a quiz based on the name: ' . $quizTitleResponse->choices[0]->message->content . '. Don\'t exceed 180 characters';
        $quizDescResponse = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => $quizDescPrompt],
            ],
        ]);

        // Store Quiz in the Database
        $storedQuiz = Quiz::create([
            'name' => $quizTitleResponse->choices[0]->message->content,
            'slug' => Str::slug($quizTitleResponse->choices[0]->message->content),
            'description' => $quizDescResponse->choices[0]->message->content,
            'category_id' => 16,
            'user_id' => auth()->user()->id,
        ]);

        $counter = 0;

        while ($counter < $numberOfQuestions) {
            $quizQuestionsPrompt = 'Based on the quiz title: ' . $quizTitleResponse->choices[0]->message->content . ', generate a question for that quiz. Don\'t exceed 180 characters, don\'t include any answers. Make it short and sweet. Keep in mind, this is question number: ' . $counter . 'therefore, pretend as if you have already reponded with that many previous questions, as I do not want any questions repeated. Do not mention the question number in the response.';

            $quizQuestionsResponse = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => $quizQuestionsPrompt],
                ],
                'frequency_penalty' => 2,
            ]);

            // Store Each Question in the Database
            $storedQuestion = Question::create([
                'name' => $quizQuestionsResponse->choices[0]->message->content,
                'quiz_id' => $storedQuiz->id,
            ]);

            // $quizQuestions[] = $quizQuestionsResponse->choices[0]->message->content;
            $counter++;

            $answerCounter = 0;

            while ($answerCounter < $numberOfAnswers) {
                if ($answerCounter === 0) {
                    // Correct Answer
                    $answerCorrectness = true;
                    $quizAnswersPrompt = 'Generate the correct answer to the question: ' . $quizQuestionsResponse->choices[0]->message->content . '. Don\'t exceed 180 characters. Don\'t specify if it is correct or not, keep it short and simple.';
                } else {
                    // Incorrectly Answer
                    $answerCorrectness = false;
                    $quizAnswersPrompt = 'Generate an incorrect answer to the question: ' . $quizQuestionsResponse->choices[0]->message->content . '. Don\'t exceed 180 characters. Don\'t specify if it is correct or not, keep it short and simple. ';
                }

                $quizAnswersResponse = OpenAI::chat()->create([
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => $quizAnswersPrompt],
                    ],
                    'frequency_penalty' => 2,
                ]);

                $storedAnswer = Answer::create([
                    'is_correct' => $answerCorrectness,
                    'name' => $quizAnswersResponse->choices[0]->message->content,
                    'question_id' => $storedQuestion->id,
                ]);

                // $questionAnswers[] = $quizAnswersResponse->choices[0]->message->content;
                $answerCounter++;
            }
        }

        return redirect("/quizzes/$storedQuiz->slug")->with('success', 'Quiz successfully created using AI.');
    }
}

// try {
//     DB::beginTransaction();
// } catch (\Exception $e) {
//     DB::rollback();
//     dd($e->getMessage());
//     return redirect()->back()->with('error', 'Failed to create quiz. Please try again later.');
// }
