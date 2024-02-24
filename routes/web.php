<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Quiz;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Quizzes
Route::get('', [QuizController::class, 'home']);
Route::get('quizzes', [QuizController::class, 'index']);
Route::get('quizzes/create', [QuizController::class, 'create'])->middleware('auth');
Route::post('quizzes/store', [QuizController::class, 'store'])->middleware('auth');

Route::get('quizzes/random', [QuizController::class, 'random']);
Route::get('quizzes/popular', [QuizController::class, 'popular']);
Route::get('quizzes/ai/create', [QuizController::class, 'openai_create'])->middleware('auth');
Route::post('quizzes/ai/store', [QuizController::class, 'openai_store'])->middleware('auth');

Route::get('quizzes/{quiz:slug}', [QuizController::class, 'show'])->name('quiz.show');
Route::get('quizzes/{quiz:slug}/edit', [QuizController::class, 'edit'])->middleware('auth');
Route::patch('quizzes/{quiz:slug}/update', [QuizController::class, 'update'])->middleware('auth');
Route::delete('quizzes/{quiz:slug}', [QuizController::class, 'destroy'])->middleware('auth');
Route::post('quizzes/{quiz:slug}/complete', [QuizController::class, 'complete']);


// Categories
Route::get('categories/{category:slug}/quizzes', [CategoryController::class, 'index']);

// Authentication / User
Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);
route::get('/users/{user:username}/delete', [RegisterController::class, 'delete'])->middleware('auth');
Route::delete('/users/{user:username}', [RegisterController::class, 'destroy'])->middleware('auth');
Route::patch('/users/{user:username}/update', [RegisterController::class, 'update'])->middleware('auth');

Route::get('login', [SessionsController::class, 'create'])->name('login');
Route::post('login', [SessionsController::class, 'store'])->name('login');
Route::delete('logout', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('users/{user:username}/profile', [ProfileController::class, 'show']);
// Maybe edit Profile too later down the line.

// Comments
Route::post('quizzes/{quiz:slug}/comment', [CommentController::class, 'store'])->middleware('auth');