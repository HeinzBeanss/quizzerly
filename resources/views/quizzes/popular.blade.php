<x-layout :pagetitle="'Quizzerly - Popular'">
    <x-announcement-bar />
    <x-gradient-background height="h-275 md:h-250" />
    <x-header />

    <section class="relative text-faintest mt-16 mb-8 md:mb-16">

        <x-search-area :categories="$categories" />

        <div class="mx-4 md:mx-0 md:w-4/5 lg:w-2/3 md:mx-auto gap-8">
            @if ($quizzes->count())
                <div class="w-full">
                    <h2 class="text-3xl font-normal mb-2">Popular Quizzes</h2>
                    <x-featured-quiz-preview :quiz="$quizzes[0]" />
                </div>
            @else
                <p class="text-center text-xl">Sorry, no quizzes found here!</p>
            @endif
        </div>
    </section>

    <section class="bg-white text-background border-background border-t-0">
        <div class="mx-4 md:mx-0 md:w-4/5 lg:w-2/3 md:mx-auto text-white pt-16 md:pt-16 pb-4">
            <div class="lg:grid lg:grid-cols-6 lg:gap-16 flex flex-col gap-8">
                @foreach ($quizzes->skip(1) as $quiz)
                    <x-quiz-preview :quiz="$quiz" />
                @endforeach

            </div>
            <div class="border-b border-background/40 w-full pb-8 mb-4"></div>
            {{ $quizzes->links() }}
        </div>
    </section>
    <x-footer />
</x-layout>
