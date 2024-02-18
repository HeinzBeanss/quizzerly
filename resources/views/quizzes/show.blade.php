<x-layout :pagetitle="$quiz->name">

    <x-gradient-background height="h-[calc(100%-8rem)]" />
    <x-header />

    <section class="relative text-faintest pt-16 pb-32">
        <div class="w-1/2 mx-auto">
            <div class="w-full">

                <div class="flex justify-between items-center">
                    <h2 class="text-3xl font-normal mb-2 text-faintest">{{ ucwords($quiz->name) }}</h2>
                    <p class="text-sm text-faintest tracking-wide">Average Score: {{ ceil($quiz->average_score) }}%</p>
                </div>

                <img class="w-full max-h-80 rounded-xl object-cover mb-8 bg-faintest border-faintest border-solid border box-border"
                    src="{{ asset("storage/{$quiz->thumbnail}") }}" alt="Quiz Thumbnail">

                <form action="/quizzes/{{ $quiz->slug }}/complete" method="post" class="flex flex-col gap-1">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                    @foreach ($quiz->questions as $questionIndex => $question)
                        <x-quiz-question :question="$question" :questionIndex="$questionIndex" />
                    @endforeach

            </div>
            <div class="end-section-quiz rounded-lg bg-white px-4 py-4 my-6 w-60 mx-auto">
                @if (is_null(session('score')))
                    <button
                        class="px-4 py-2.5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow">Complete
                        Quiz</button>
                @else
                    <p class="text-background/80 w-full text-center">Your results:</p>
                    <p class="text-background/80 w-full text-2xl font-medium text-center">
                        {{ ceil(session('percentage')) }}%</p>
                    <p class="text-background/80 w-full text-center mb-2">{{ session('score') }} of
                        {{ count(session('correctAnswers')) }} questions correct.</p>

                    <a class="block text-center px-4 py-2.5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow"
                        href="/quizzes">Find more quizzes</a>
                @endif
            </div>
            </form>

            <div class="w-full">

                <h3 class="text-lg text-faintest font-light mt-2">Comments</h3>

                <div class="flex flex-col bg-white px-4 py-4 rounded-lg gap-2 mb-3">
                    @auth
                        <form method="POST" action="/quizzes/{{ $quiz->slug }}/comment">
                            @csrf
                            <div class="flex justify-between items-center w-full">
                                <label for="commentInput"
                                    class="block text-sm font-normal leading-6 text-background/80 mb-1">Write a
                                    comment, {{ ucwords(auth()->user()->name) }}.</label>
                                @error('body')
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                            <input id="commentInput" type="text" name="body" value="{{ old('body') }}"
                                class="pl-2 block w-full rounded-md border-0 py-1.5 text-background/80 shadow-sm ring-1 ring-inset ring-faint focus:ring-1 focus:outline-0 focus:ring-surface sm:text-sm sm:leading-6 mb-2 placeholder-background/50"
                                required>
                            <button
                                class="mt-2 px-4 py-2.5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-40 text-sm font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow">Post
                                Comment</button>
                        </form>
                    @else
                        <p class="text-sm text-background/80">Please log in to post a comment.</p>
                    @endauth
                </div>

                <div class="flex flex-col bg-white px-4 py-4 rounded-lg mb-3">
                    @foreach ($quiz->comments as $commentIndex => $comment)
                        <div class="border-faint {{ $commentIndex === 0 ? '' : 'border-b my-4' }}"></div>
                        <div class="flex gap-4 items-start justify-start comment-container">
                            <img class="w-12 rounded-md"
                                src="{{ asset("storage/profile_pictures/{$comment->author->profile_picture}") }}"
                                alt="">
                            <div class="right w-full">
                                <p class="text-sm font-medium leading-6 text-background/80">
                                    {{ $comment->author->name }}
                                </p>
                                <p
                                    class="block w-full rounded-md border-0 text-background/80 sm:text-sm sm:leading-6 placeholder-background/50">
                                    {{ $comment->body }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layout>
