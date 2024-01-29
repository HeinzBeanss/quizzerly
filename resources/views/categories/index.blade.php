<x-layout :pagetitle="'Quizzerly - ' . $category->name">

    <x-featured-quiz-preview :quiz="$quizzes[0]" />
    <div class="lg:grid lg:grid-cols-6 gap-4 mt-4">
        @foreach ($quizzes->skip(1) as $quiz)
            <x-quiz-preview :quiz="$quiz" />
        @endforeach
    </div>

    {{-- $topQuizzes contains the top 5 quizzes --}}
</x-layout>
