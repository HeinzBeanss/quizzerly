<x-layout :pagetitle="'Quizzerly - Create a Quiz'">
    <h2>Create your quiz</h2>

    <form id="quiz-form" action="/quizzes/store" method="POST" enctype="multipart/form-data"
        class="w-3/4 flex flex-col gap-4">
        @csrf

        <input type="text" name="name" placeholder="Enter a quiz title." value="{{ old('name') }}">
        <input type="text" name="description" placeholder="Enter a description for your quiz."
            value="{{ old('description') }}">
        <input type="file" name="thumbnail" accept="image/*" value="{{ old('thumbnail') }}">

        {{-- if old, then set that to current category, otherwise 0 it. --}}
        <x-dropdown :categories="$categories" :currentCategory="$categories[0]" />

        <div id="question-container">
            <x-input-question />
        </div>


    </form>

    <button class="px-8 py-2 bg-surface rounded-xl" type="button" onclick="addQuestion()">Add Question</button>

    <button form="quiz-form" class="px-8 py-2 bg-surface rounded-xl" type="submit">Create Quiz</button>


    @if ($errors->any())
        <div class="text-red text-xs">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</x-layout>
