<x-layout :pagetitle="'Quizzerly - Create a Quiz'">

    <h2>Create your quiz</h2>

    <form id="question-form" action="/quizzes/store" method="POST" class="w-3/4 flex flex-col gap-4">
        @csrf


    </form>

    <button class="px-8 py-2 bg-surface rounded-xl" onclick="addQuestion()">Add Question</button>

</x-layout>