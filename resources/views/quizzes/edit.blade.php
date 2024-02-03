<x-layout :pagetitle="'Quizzerly - Edit'">
    <h2>Create your quiz</h2>

    <form id="quiz-form" action="/quizzes/update" method="POST" enctype="multipart/form-data"
        class="w-3/4 flex flex-col gap-4">
        @method('PATCH')
        @csrf

        <input type="text" name="name" placeholder="Enter a quiz title." value="{{ old('title', $quiz->name) }}">
        <input type="text" name="description" placeholder="Enter a description for your quiz."
            value="{{ old('description', $quiz->description) }}">
        <input type="file" name="thumbnail" accept="image/*" value="{{ old('thumbnail', $quiz->thumbnail) }}">


        <x-dropdown :categories="$categories" :currentCategory="$quiz->category" />

        <div id="question-container">
            {{-- <x-input-question /> --}}
            @foreach ($quiz->questions as $index => $question)
                <x-edit-question :index="$index" :question="$question" />
            @endforeach
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
