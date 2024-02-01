<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category) {
        return view('categories.index', [
            'category' => $category,
            'categories' => Category::all(),
            'quizzes' => $category->quizzes()->paginate(8),
            'topQuizzes' => $category->quizzes()->orderBy('times_taken', 'desc')->take(5)->get(),
        ]);
    }
}
