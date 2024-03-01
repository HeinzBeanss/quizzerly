<x-layout :pagetitle="'Quizzerly - Edit'">

    <x-gradient-background height="h-[calc(100%_-_4rem)]" />
    <x-header />

    <section class="relative text-faintest pt-16 pb-8 lg:pb-32">
        <div class="mx-4 sm:w-4/5 lg:w-3/4 xl:w-1/2 sm:mx-auto gap-8">
            <h2 class="text-3xl font-normal mb-2 text-faintest">Edit Your Quiz</h2>


            <form id="quiz-form" action="/quizzes/{{ $quiz->slug }}/update" method="POST" enctype="multipart/form-data"
                class="flex flex-col gap-1">
                @method('PATCH')
                @csrf
                <h3 class="text-lg text-faintest font-light">General Information</h3>

                <div class="bg-white px-4 py-4 rounded-lg mb-2">
                    <x-edit-input name="name" type="text" :oldvalue="$quiz->name" />
                    <div class="mb-4"></div>
                    <x-edit-input name="description" type="text" :oldvalue="$quiz->description" />

                    <div class="mb-4"></div>
                    <p class="text-background/80 text-sm font-medium pb-2">Image</p>
                    <x-upload-file />
                    <div class="mb-4"></div>
                    <p class="text-background/80 text-sm font-medium pb-2">Category</p>
                    <x-dropdown :categories="$categories" :currentCategory="$quiz->category" />
                </div>

                <h3 class="text-lg text-faintest font-light">Questions</h3>

                <p class="text-sm text-faintest font-light">Note: Both questions and answers will be displayed in
                    random order when
                    users take
                    the quiz.
                </p>

                <div id="question-container">
                    {{-- <x-input-question /> --}}
                    @foreach ($quiz->questions as $index => $question)
                        <x-edit-question :index="$index" :question="$question" />
                    @endforeach
                </div>
            </form>

            <div class="end-section-quiz rounded-lg bg-white px-4 py-4 mt-1">
                <div class="buttoncontainer flex flex-col sm:flex-row gap-4 items-center">
                    <button
                        class="px-4 py-2.5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md min-w-40 text-xs sm:text-sm font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow"
                        type="button" onclick="addQuestion()">Add Question</button>

                    <button form="quiz-form"
                        class="px-4 py-2.5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md min-w-40 text-xs sm:text-sm font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow"
                        type="submit">Update Quiz</button>
                        <p id="questionError" class="text-red-500 text-sm"></p>
                </div>
            </div>
            @if ($errors->any())
                <div class="text-red text-xs">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>
    <x-footer />
</x-layout>
