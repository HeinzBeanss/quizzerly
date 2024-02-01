<x-layout :pagetitle="'Quizzerly - Home'">
    <main>

        @if ($quizzes->count())
            <div class="w-full flex flex-col gap-20 justify-center items-center mt-6 text-words">

                <section class="flex gap-10 w-3/4">
                    <div class="w-full">
                        <h2 class="text-3xl mb-2">Featured Quiz</h2>
                        <x-featured-quiz-preview :quiz="$featuredquiz" />
                    </div>
                    <x-search-area :categories="$categories" />
                </section>

                <section>
                    <h2 class="text-3xl mb-4">Pick a category</h2>
                    <div class="slider w-full overflow-hidden relative">
                        <div class="slides flex gap-6 transition-transform duration-500 ease-in-out">
                            @foreach ($categories as $category)
                                <div class="slide border-box min-w-[calc(100%_/_6)] bg-surface rounded-xl relative">
                                    <div class="w-full h-full rounded-xl">
                                        <a href="/categories/{{ $category->slug }}/quizzes">
                                            <img class="w-full h-52 object-cover object-center rounded-xl"
                                                src="{{ asset("storage/categories/{$category->thumbnail}") }}"
                                                alt="Your alt text" />
                                        </a>
                                    </div>
                                    <div
                                        class="absolute top-0 left-0 w-full h-full flex items-center justify-center opacity-100 hover:opacity-0 transition-opacity duration-500">
                                        <span
                                            class="text-white text-lg bg-black px-4 py-2 bg-opacity-70 rounded-xl">{{ $category->name }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <script src="{{ asset('js/carousel.js') }}"></script>

                </section>

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
