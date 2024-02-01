<x-layout :pagetitle="'Quizzerly - Popular'">
    <main>

        @if ($quizzes->count())
            <div class="w-full flex flex-col gap-20 justify-center items-center mt-6 text-words">

                <section class="flex gap-10 w-3/4">
                    <div>
                        <h2 class="text-3xl mb-2">Top Quizzes</h2>
                        <x-featured-quiz-preview :quiz="$quizzes[0]" />
                        <div class="lg:grid lg:grid-cols-6 gap-4 mt-4">
                            @foreach ($quizzes->skip(1) as $quiz)
                                <x-quiz-preview :quiz="$quiz" />
                            @endforeach

                        </div>
                        {{ $quizzes->links() }}
                    </div>

                </section>
            </div>
        @else
            No Quizzes to Style.
        @endif

    </main>
</x-layout>
