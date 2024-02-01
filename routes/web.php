<?php

use App\Http\Controllers\CategoryController;
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


// Welcome
Route::get('/', function () {
    return view('welcome');
});

// Quizzes
Route::get('home', [QuizController::class, 'home']);
Route::get('quizzes', [QuizController::class, 'index']);
Route::get('quizzes/create', [QuizController::class, 'create'])->middleware('auth');
Route::post('quizzes/store', [QuizController::class, 'store'])->middleware('auth');
Route::get('quizzes/edit', [QuizController::class, 'edit'])->middleware('auth');
Route::patch('quizzes/update', [QuizController::class, 'update'])->middleware('auth');
Route::delete('quizzes/destroy', [QuizController::class, 'destroy'])->middleware('auth');

Route::get('quizzes/random', [QuizController::class, 'random']);
Route::get('quizzes/popular', [QuizController::class, 'popular']);

Route::get('quizzes/{quiz:slug}', [QuizController::class, 'show'])->name('quiz.show');
Route::post('quizzes/{quiz:slug}/complete', [QuizController::class, 'complete']);


// Categories
Route::get('categories/{category:slug}/quizzes', [CategoryController::class, 'index']);

// Authentication / User
Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);
Route::get('login', [SessionsController::class, 'create'])->name('login');
Route::post('login', [SessionsController::class, 'store'])->name('login');

Route::get('profile', [ProfileController::class, 'show'])->middleware('auth');
// Maybe edit Profile too later down the line.

// 