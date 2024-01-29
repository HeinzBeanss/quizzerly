<x-layout :pagetitle="'Quizzerly - ' . $quiz->name">

    @if (session('selectedAnswers'))
    @endif

    {{-- Where the user actually takes the quiz. --}}
    <h2>{{ $quiz->name }}</h2>

    <form action="/quizzes/{{ $quiz->slug }}/complete" method="post">
        @csrf
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        @foreach ($quiz->questions as $question)
            <x-quiz-question :question="$question" />
        @endforeach

        @if (is_null(session('score')))
            <button class="bg-surface rounded-xl py-4 px-6 text-white mt-4">Complete Quiz</button>
        @else
            <p>You got:</p>
            <p>{{ session('score') }} / {{ count(session('correctAnswers')) }}</p>
            <p>{{ ceil(session('percentage')) }}%</p>
        @endif

    </form>
</x-layout>
