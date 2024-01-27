<x-layout :pagetitle="'Quizzerly - Home'">

    <main class="mx-auto w-3/4 flex gap-10">

        @if ($quizzes->count())
            <div class="w-full flex flex-col gap-20 justify-center items-start mt-6 text-words">

                {{-- 3 flex rows inside one flex col -- NEED TO REMAKE --}}
                <section class="flex gap-10">
                    <div class="w-full">
                        <h2 class="text-3xl mb-2">Featured Quiz</h2>
                        <x-featured-quiz-preview :quiz="$quizzes[0]" />
                    </div>
                    <div class="w-1/6 mt-11 ">
                        <div class="">
                            <input type="search" class="rounded-xl w-96 pl-8" placeholder="Search">
                        </div>

                        <button class="px-6 py-4 bg-surface rounded-xl text-xl">Random Quiz</button>
                        or
                        <button class="px-6 py-4 bg-surface rounded-xl text-xl">Create your own quiz!</button>
                        expand this section to fill the most up.

                        Remember, less lines, more surface usage with good padding
                    </div>
                </section>

                <section>
                    <h2 class="text-3xl">Pick a category</h2>
                    <div>Rotatory thing goes here, I want it all the way accross though..</div>
                </section>

                <div class="border-l border-gray-300 mx-6 h-full"></div>

                <section class="flex gap-10">
                    <div>
                        <h2 class="text-3xl mb-2">New Quizzes</h2>
                        <x-featured-quiz-preview :quiz="$quizzes[1]" />
                        <div class="lg:grid lg:grid-cols-6 gap-4 mt-4">
                            @foreach ($quizzes->skip(2) as $quiz)
                                <x-quiz-preview :quiz="$quiz" />
                            @endforeach
                        </div>
                    </div>

                    <div class="w-1/6">
                        TOp quizzes
                    </div>
                    <div class="border-b border-gray-300 my-6"></div>

                </section>
            </div>
        @else
            No Quizzes to Style.
        @endif

    </main>
</x-layout>
