<x-layout :pagetitle="'Quizzerly - Home'">

    <section class="bg-gradient-to-br from-background to-surface w-full text-white pt-24 pb-32">
        <div class="w-5/6 mx-auto flex gap-8">
            @if ($quizzes->count())
                <div class="w-full">
                    <h2 class="text-3xl font-normal mb-2">Featured Quiz</h2>
                    <x-featured-quiz-preview :quiz="$featuredquiz" />
                </div>
                <x-search-area :categories="$categories" />
            @else
                No Quizzes to Style.
            @endif
        </div>
    </section>

    <x-home.category-section :categories="$categories" />

    <div class="border-l border-gray-300 mx-6 h-full"></div>

    <section class="flex gap-10 w-3/4">
        <div>
            <h2 class="text-3xl mb-2">New Quizzes</h2>
            <x-featured-quiz-preview :quiz="$quizzes[0]" />
            <div class="lg:grid lg:grid-cols-6 gap-4 mt-4">
                @foreach ($quizzes->skip(1) as $quiz)
                    <x-quiz-preview :quiz="$quiz" />
                @endforeach

            </div>
        </div>

        <div class="w-1/6">
            <x-top-quizzes :topquizzes="$topquizzes" />
        </div>
        <div class="border-b border-gray-300 my-6"></div>

    </section>

    <a class="bg-surface rounded-xl px-8 py-4" href="/quizzes">Browse More Quizzes</a>

</x-layout>
