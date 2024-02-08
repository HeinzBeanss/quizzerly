<x-layout :pagetitle="'Quizzerly - All Quizzes'">

    {{-- make into component accepting a height variable i guess? --}}
    <x-gradient-background height="h-full" />
    <x-header />

    <section class="relative text-faintest pt-16 pb-32">

        <x-search-area :categories="$categories" />

        <div class="w-2/3 mx-auto gap-8">
            @if ($quizzes->count())
                <div class="w-full">
                    <h2 class="text-3xl font-normal mb-2">All Quizzes</h2>
                    <x-featured-quiz-preview :quiz="$quizzes[0]" />
                </div>
                <div>
                    <div class="lg:grid lg:grid-cols-6 gap-12 mt-12 mb-4">
                        @foreach ($quizzes->skip(1) as $quiz)
                            <x-quiz-preview :quiz="$quiz" />
                        @endforeach

                    </div>

                    {{ $quizzes->links() }}
                </div>
            @else
                <p class="text-center text-xl pt-">No Quizzes to Style.</p>
            @endif
        </div>
    </section>

</x-layout>
