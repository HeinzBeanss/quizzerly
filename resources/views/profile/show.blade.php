<x-layout :pagetitle="'Quizzerly - ' . ucwords(auth()->user()->name)">

    <h1>Profile</h1>

    <div class="flex justify-between">
        <img src="" alt="">


        <div class="flex flex-col">
            <h2>{{ auth()->user()->name }}</h2>
            <p>Username: {{ auth()->user()->username }}</p>
            <p>Account created: {{ auth()->user()->created_at->diffForHumans() }}</p>
        </div>
    </div>

    <h1>Quizzes ({{ count($quizzes) }})</h1>

    <div class="lg:grid lg:grid-cols-6 gap-4 mt-4">
        @foreach ($quizzes as $quiz)
            <x-quiz-preview :quiz="$quiz" />
            <a class="bg-surface px-6 py-4 rounded-xl" href="quizzes/edit/{{ $quiz->slug }}">Edit Quiz</a>
        @endforeach

    </div>

</x-layout>
