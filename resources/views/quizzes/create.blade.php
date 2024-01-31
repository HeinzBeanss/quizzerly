<x-layout :pagetitle="'Quizzerly - Create a Quiz'">
    <h2>Create your quiz</h2>

    <form id="quiz-form" action="/quizzes/store" method="POST" enctype="multipart/form-data"
        class="w-3/4 flex flex-col gap-4">
        @csrf

        <input type="text" name="name" placeholder="Enter a quiz title.">
        <input type="text" name="description" placeholder="Enter a description for your quiz.">
        <input type="file" name="thumbnail" accept="image/*">


            <x-dropdown :categories="$categories" />

            <x-input-question />

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
