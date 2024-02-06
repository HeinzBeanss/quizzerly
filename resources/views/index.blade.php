<x-layout :pagetitle="'Quizzerly - Home'">

    <section class="relative text-faintest pt-36 pb-32">
        <div class="w-5/6 mx-auto flex gap-8">
            @if ($quizzes->count())
                <div class="w-full">
                    <h2 class="text-3xl font-normal mb-2">Featured Quiz</h2>
                    <x-featured-quiz-preview :quiz="$featuredquiz" />
                </div>
                {{-- <x-search-area :categories="$categories" /> --}}
            @else
                No Quizzes to Style.
            @endif
        </div>
    </section>


    <x-home.category-section :categories="$categories" />

    <section class="bg-gradient-to-tl from-background to-surface mb-2 border-background border-t-4">
        <div class="w-5/6 mx-auto text-white pt-16 pb-32">

            <div class="flex gap-12">
                <div class="flex flex-col w-full">
                    <h2 class="text-3xl mb-2">New Quizzes</h2>
                    <x-featured-quiz-preview :quiz="$quizzes[0]" />
                </div>

                <div class="flex flex-col w-1/2">
                    <h3 class="text-2xl">Top Quizzes</h3>
                    <x-top-quizzes :topquizzes="$topquizzes" />
                </div>

            </div>

            <div class="lg:grid lg:grid-cols-6 gap-12 mt-12">
                @foreach ($quizzes->skip(1) as $quiz)
                    <x-quiz-preview :quiz="$quiz" />
                @endforeach
            </div>
        </div>

        <div class="w-1/6">
        </div>
        <div class="border-b border-gray-300 my-6"></div>


    </section>

    <div class="w-full mx-auto">
        <a class="bg-surface rounded-xl px-8 py-4 " href="/quizzes">Browse More Quizzes</a>
    </div>

</x-layout>
