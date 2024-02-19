<x-layout :pagetitle="'Quizzerly - Home'">
    <x-announcement-bar />
    <x-gradient-background height="h-300" />
    <x-header />

    <section class="relative text-faintest pt-16 pb-32 ">

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

    <section class="bg-faint text-background border-background border-t-0">
        <div class="w-2/3 mx-auto text-white pt-20 pb-4">

            <div class="flex gap-16">
                <div class="flex flex-col w-full">
                    <h2
                        class="text-3xl font-medium bg-clip-text text-transparent bg-gradient-to-br from-background/85 to-surface mb-2">
                        New Quizzes</h2>
                    <x-quiz-preview :quiz="$quizzes[0]" />
                </div>

                <div class="flex flex-col w-1/2">
                    <h3
                        class="text-2xl font-medium bg-clip-text text-transparent bg-gradient-to-br from-background/85 to-surface mb-3">
                        Top Quizzes</h3>
                    <x-top-quizzes :topquizzes="$topquizzes" />
                </div>

            </div>

            <div class="lg:grid lg:grid-cols-6 gap-16 mt-16">
                @foreach ($quizzes->skip(1) as $quiz)
                    <x-quiz-preview :quiz="$quiz" />
                @endforeach
            </div>

            <div class="border-b border-background/40 w-full pb-8 mb-4"></div>
        </div>

        {{-- <div class="border-b border-gray-300 my-6"></div> --}}



        <div class="w-full mx-auto flex justify-center pb-16">
            <a class="px-10 py-5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 text-white rounded-md min-w-40 text-normal font-light tracking-wide border border-white"
                href="/quizzes">Browse More Quizzes</a>
        </div>

    </section>

    <x-footer />

</x-layout>
