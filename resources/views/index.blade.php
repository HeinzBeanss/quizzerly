<x-layout :pagetitle="'Quizzerly - Home'">
    <x-announcement-bar />
    <x-gradient-background height="h-300" />
    <x-header />

    <section class="relative text-faintest pt-16 pb-20 md:pb-32">

        <x-search-area :categories="$categories" />

        <div class="mx-4 md:mx-0 md:w-4/5 lg:w-2/3 md:mx-auto flex gap-8">
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
        <div class="mx-4 md:mx-0 md:w-4/5 lg:w-2/3 md:mx-auto text-white pt-20 pb-4">

            <div class="flex flex-col  md:flex-row gap-8 lg:gap-16">
                <div class="flex flex-col w-full order-last md:order-first">
                    <h2
                        class="text-3xl font-medium bg-clip-text text-transparent bg-gradient-to-br from-background/75 to-lighter mb-2">
                        New Quizzes</h2>
                    <x-quiz-preview :quiz="$quizzes[0]" />
                </div>

                <div class="flex flex-col w-full md:w-1/2">
                    <h3
                        class="text-2xl font-medium bg-clip-text text-transparent bg-gradient-to-br from-background/75 to-lighter mb-1 md:mb-3">
                        Top Quizzes</h3>
                    <x-top-quizzes :topquizzes="$topquizzes" />
                </div>

            </div>

            <div class="lg:grid lg:grid-cols-6 lg:gap-16 mt-16 flex flex-col gap-8">
                @foreach ($quizzes->skip(1) as $quiz)
                    <x-quiz-preview :quiz="$quiz" />
                @endforeach
            </div>

            <div class="border-b border-background/40 w-full pb-8 mb-4"></div>
        </div>

        {{-- <div class="border-b border-gray-300 my-6"></div> --}}



        <div class="w-full mx-auto flex justify-center pb-8">
            <a class="px-10 py-5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 text-white rounded-md min-w-40 text-normal font-light tracking-wide border border-white"
                href="/quizzes">Browse More Quizzes</a>
        </div>

    </section>

    <x-footer />

</x-layout>
