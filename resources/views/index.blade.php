<x-layout :pagetitle="'Quizzerly - Home'">
    {{-- make into component accepting a height variable i guess? --}}
    <x-gradient-background height="h-300" />
    <x-header />

    <section class="relative text-faintest pt-16 pb-32">

        <x-search-area :categories="$categories" />

        <div class="w-2/3 mx-auto flex gap-8">
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

    <section class="bg-gradient-to-tl from-background to-surface border-background border-t-2">
        <div class="w-2/3 mx-auto text-white pt-16 pb-16">

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

        {{-- <div class="border-b border-gray-300 my-6"></div> --}}

        <div class="w-full mx-auto flex justify-center pb-16">
            <a class="bg-surface rounded-xl px-8 py-4 text-faintest" href="/quizzes">Browse More Quizzes</a>
        </div>

    </section>



</x-layout>
