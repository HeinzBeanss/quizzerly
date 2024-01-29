<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Category;
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

        $categories = [
            'science' => [
                'name' => 'Science',
                'slug' => 'science',
                'thumbnail' => 'science.jpg'
            ],
                'history' => [
                'name' => 'History',
                'slug' => 'history',
                'thumbnail' => 'history.jpg'
            ],
                'general_knowledge' => [
                'name' => 'General Knowledge',
                'slug' => 'general-knowledge',
                'thumbnail' => 'general_knowledge.jpg'
            ],
                'literature' => [
                'name' => 'Literature',
                'slug' => 'literature',
                'thumbnail' => 'literature.jpg'
            ],
                'movies' => [
                'name' => 'Movies',
                'slug' => 'movies',
                'thumbnail' => 'movies.jpg'
            ],
                'television' => [
                'name' => 'Television',
                'slug' => 'television',
                'thumbnail' => 'television.jpg'
            ],
                'music' => [
                'name' => 'Music',
                'slug' => 'music',
                'thumbnail' => 'music.jpg'
            ],
                'sports' => [
                'name' => 'Sports',
                'slug' => 'sports',
                'thumbnail' => 'sports.jpg'
            ],
                'geography' => [
                'name' => 'Geography',
                'slug' => 'geography',
                'thumbnail' => 'geography.jpg'
            ],
                'food' => [
                'name' => 'Food',
                'slug' => 'food',
                'thumbnail' => 'food.jpg'
            ],
                'technology' => [
                'name' => 'Technology',
                'slug' => 'technology',
                'thumbnail' => 'technology.jpg'
            ],
                'art' => [
                'name' => 'Art',
                'slug' => 'art',
                'thumbnail' => 'art.jpg'
            ],
                'pop_culture' => [
                'name' => 'Pop Culture',
                'slug' => 'pop-culture',
                'thumbnail' => 'pop_culture.jpg'
            ],
                'games' => [
                'name' => 'Games',
                'slug' => 'games',
                'thumbnail' => 'games.jpg'
            ],                        
                'animals' => [
                'name' => 'Animals',
                'slug' => 'animals',
                'thumbnail' => 'animals.jpg'
            ]
        ];

        foreach ($categories as $category) {
            
            Category::factory()->create([
            'name' => $category['name'],
            'slug' => $category['slug'],
            'thumbnail' => $category['thumbnail'],
            ]);
        }


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
