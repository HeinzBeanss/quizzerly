<?php

use App\Http\Controllers\LoginController;
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
Route::get('home', [QuizController::class, 'index']);
Route::get('quizzes/{quiz:slug}', [QuizController::class, 'show']);
Route::get('quizzes/create', [QuizController::class, 'create']);
Route::post('quizzes/store', [QuizController::class, 'store']);
Route::get('quizzes/edit', [QuizController::class, 'edit']);
Route::patch('quizzes/update', [QuizController::class, 'update']);
Route::delete('quizzes/destroy', [QuizController::class, 'destroy']);

// Authentication
Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);
Route::get('login', [SessionsController::class, 'create']);
Route::post('login', [SessionsController::class, 'store']);