<x-layout :pagetitle="'Quizzerly - ' . $category->name">
    <x-announcement-bar />
    <x-gradient-background height="h-250" />
    <x-header />

    <section class="relative text-faintest mt-16 mb-16">

        <x-search-area :categories="$categories" />

        <div class="w-2/3 mx-auto gap-8">
            @if ($quizzes->count())
                <div class="w-full">
                    <h2 class="text-3xl font-normal mb-2">All Quizzes - {{ $category->name }}</h2>
                    <x-featured-quiz-preview :quiz="$quizzes[0]" />
                </div>
            @else
                <p class="text-center text-xl">Sorry, no quizzes found here!</p>
            @endif
        </div>
    </section>

    <section class="bg-white text-background border-background border-t-0">
        <div class="w-2/3 mx-auto text-white pt-16 pb-8">
            @if ($quizzes->count() > 1)
                <div class="lg:grid lg:grid-cols-6 gap-16 mt-0 mb-4">

                    @foreach ($quizzes->skip(1) as $quiz)
                        <x-quiz-preview :quiz="$quiz" />
                    @endforeach
                </div>
                <div class="border-b border-background/40 w-full pb-8 mb-4"></div>
                {{ $quizzes->links() }}
        </div>
    @else
        <p class="text-center text-background">No more quizzes to find here.</p>
        @endif
    </section>

    <x-footer />
</x-layout>
