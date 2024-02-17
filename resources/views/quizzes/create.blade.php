<x-layout :pagetitle="'Quizzerly - Create a Quiz'">

    <x-gradient-background height="h-full" />
    <x-header />

    <section class="relative text-faintest pt-16 pb-32">
        <div class="w-1/2 mx-auto">
            <div class="w-full">
                <h2 class="text-3xl font-normal mb-2 text-faintest">Create Your Quiz</h2>


                <form id="quiz-form" action="/quizzes/store" method="POST" enctype="multipart/form-data"
                    class="flex flex-col gap-1">
                    @csrf

                    <h3 class="text-lg text-faintest font-light">General Information</h3>

                    <div class="bg-white px-4 py-4 rounded-lg mb-2">
                        <x-input name="name" type="text" placeholder="Enter a quiz title." />
                        <div class="mb-4"></div>
                        <x-input name="description" type="text" placeholder="Enter a description for your quiz." />
                        <div class="mb-4"></div>

                        <p class="text-background/80 text-sm font-medium pb-2">Image</p>
                        <x-upload-file />
                        <div class="mb-4"></div>

                        <p class="text-background/80 text-sm font-medium pb-2">Category</p>
                        <x-dropdown :categories="$categories" :currentCategory="$categories[0]" />

                    </div>


                    <h3 class="text-lg text-faintest font-light">Questions</h3>

                    <p class="text-sm text-faintest font-light">Note: Both questions and answers will be displayed in
                        random order when
                        users take
                        the quiz.
                    </p>
                    <div id="question-container">
                        <x-input-question />
                    </div>

                </form>

                <div class="end-section-quiz rounded-lg bg-white px-4 py-4 mt-1">
                    <div class="buttoncontainer flex gap-4">
                        <button
                            class="px-4 py-2.5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md min-w-40 text-sm font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow"
                            type="button" onclick="addQuestion()">Add
                            Question</button>
                        <button form="quiz-form"
                            class="px-4 py-2.5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md min-w-40 text-sm font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow"
                            type="submit">Create Quiz</button>
                    </div>
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

</x-layout>
