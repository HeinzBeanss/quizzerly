<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Comment;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(5)->create();

        foreach($users as $user) {

            $quizzes = Quiz::factory(2)->create([
                'user_id' => $user->id,
            ]);

            foreach($quizzes as $quiz) {

                $questions = Question::factory(4)->create([
                    'quiz_id' => $quiz->id,
                ]);

                foreach($questions as $question) {

                    $answers = Answer::factory(4)->create([
                    'question_id' => $question->id,
                    ]);

                    $answers->each(function ($answer, $index) {
                        $answer->is_correct = ($index === 0);
                        $answer->save();
                    });

                }

                $comments = Comment::factory()->create([
                    'user_id' => $user->id,
                    'quiz_id' => $quiz->id,
                ]);
            }
        }
    }
}
