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

            <a class="bg-surface rounded-xl px-6 py-4 mt-7" href="/quizzes">Find more quizzes</a>
        @endif
    </form>

    <h2>Comments</h2>

    <div class="bg-surface roundedxl">
        <form method="POST" action="/quizzes/{{ $quiz->slug }}/comment">
            @csrf
            <input type="text" name="body" value="{{ old('body') }}" required>
            <button class="bg-surface rounded-xl">Comment</button>
        </form>
    </div>

    <div>
        @foreach ($quiz->comments as $comment)
            <p>{{ $comment->author->name }}</p>
            <p>{{ $comment->body }}</p>
        @endforeach
    </div>
</x-layout>
