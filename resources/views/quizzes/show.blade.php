<x-layout :pagetitle="$quiz->name">
    {{-- @dd($quiz->questions) --}}
    <x-announcement-bar />
    <x-gradient-background height="h-200 sm:h-200" />
    <x-header />

    <section class="relative text-faintest pt-16 mb-20 sm:mb-12">
        <div class="mx-4 sm:w-4/5 lg:w-3/4 xl:w-1/2 sm:mx-auto gap-8">

            <div class="flex flex-col sm:flex-row sm:gap-4 justify-between items-center">
                <h2
                    class="text-lg sm:text-3xl font-normal mb-2 text-faintest leading-snug sm:line-clamp-1 overflow-hidden overflow-ellipsis">
                    {{ ucwords($quiz->name) }}</h2>
                <p class="text-sm text-faintest tracking-wide line-clamp-1 min-w-36 mb-1 sm:mb-0 ">Average Score:
                    {{ ceil($quiz->average_score) }}%</p>
            </div>

            <img class="w-full max-h-72 h-72 sm:max-h-80 sm:h-80 rounded-xl object-cover mb-2 bg-faintest"
                src="{{ asset("storage/{$quiz->thumbnail}") }}" alt="Quiz Thumbnail">

            @if ($quiz->aigenerated === 1)
                <div class="relative">
                    <p class="absolute top-0 text-white text-sm font-thin">Note: This quiz was generated using AI based
                        off a user's topic, it may be both inaccurate and inconsistent.</p>
                </div>
            @endif
        </div>
    </section>

    <section class="bg-white text-background border-background border-t-0">
        <div class="mx-4 sm:w-4/5 lg:w-3/4 xl:w-1/2 sm:mx-auto gap-8 text-background pt-8 sm:pt-16 pb-4">

            <p class="text-lg border-b border-surface/20 mb-4 pb-4">{{ $quiz->description }}</p>

            <form action="/quizzes/{{ $quiz->slug }}/complete" method="post" class="flex flex-col gap-1">
                @csrf
                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                @foreach ($quiz->questions as $questionIndex => $question)
                    <x-quiz-question :question="$question" :questionIndex="$questionIndex" />
                @endforeach

        </div>
        <div
            class="end-section-quiz rounded-lg bg-faint px-4 py-4 mb-2 my-0 sm:my-6 w-60 mx-auto flex flex-col justify-center">
            @if (is_null(session('score')))
                <button
                    class="px-4 text-white py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm sm:text-base font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow">Complete
                    Quiz</button>
            @else
                <p class="text-sm sm:text-base text-background/80 w-full text-center">Your results:</p>
                <p class="text-lg text-background/80 w-full sm:text-2xl font-medium text-center">
                    {{ ceil(session('percentage')) }}%</p>
                <p class="text-sm sm:text-base text-background/80 w-full text-center mb-2">{{ session('score') }} of
                    {{ count(session('correctAnswers')) }} questions correct.</p>

                <a class="text-center px-4 text-white py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm sm:text-base font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow"
                    href="/quizzes">Find more quizzes</a>
            @endif
        </div>
        </form>

        @if ($quiz->aigenerated === 1)
            <p class="w-full text-center text-sm">Created by <a class="underline underline-offset-2"
                    href="/users/{{ $quiz->user->username }}/profile">
                    {{ $quiz->user->name }}</a> using ChatGPT</p>
        @else
            <p class="w-full text-center text-sm">Created by <a class="underline underline-offset-2"
                    href="/users/{{ $quiz->user->username }}/profile">
                    {{ $quiz->user->name }}</a></p>
        @endif

        <div class="mx-4 sm:w-4/5 lg:w-3/4 xl:w-1/2 sm:mx-auto gap-8 text-background pt-4 pb-4">

            <h3 class="text-lg text-background font-normal mb-1 mt-2">Comments</h3>

            <div class="flex flex-col bg-faint px-4 py-4 rounded-lg gap-2 mb-4">
                @auth
                    <form method="POST" action="/quizzes/{{ $quiz->slug }}/comment">
                        @csrf
                        <div class="flex justify-between items-center w-full">
                            <label for="commentInput"
                                class="block text-sm font-normal leading-6 text-background/80 mb-1">Write
                                a
                                comment, {{ ucwords(auth()->user()->name) }}.</label>
                            @error('body')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <input id="commentInput" type="text" name="body" value="{{ old('body') }}"
                            class="pl-2 block w-full rounded-md border-0 py-1.5 text-background/80 shadow-xs ring-1 ring-inset ring-faint focus:ring-1 focus:outline-0 focus:ring-surface sm:text-sm sm:leading-6 mb-2 placeholder-background/50"
                            required>
                        <button
                            class="mt-2 px-4 py-2.5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-40 text-sm text-white font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow">Post
                            Comment</button>
                    </form>
                @else
                    <p class="text-sm text-background/80">Please log in to post a comment.</p>
                @endauth
            </div>

            @if (count($quiz->comments) > 0)
                <div class="flex flex-col">
                    @foreach ($quiz->comments as $commentIndex => $comment)
                        <div
                            class="flex bg-faint px-4 py-4 rounded-lg mb-4 gap-4 items-start justify-start comment-container">
                            <a class="w-12 h-12" href="/users/{{ $comment->author->username }}/profile">
                                <img class="min-w-12 h-full object-cover rounded-md"
                                    src="{{ asset("storage/profile_pictures/{$comment->author->profile_picture}") }}"
                                    alt="{{ $comment->author->name }}"></a>
                            <div class="right w-full">
                                <a href="/users/{{ $comment->author->username }}/profile"
                                    class="text-sm font-medium leading-6 text-background/80">
                                    {{ $comment->author->name }}
                                </a>
                                <p
                                    class="block w-full rounded-md border-0 text-background/80 text-xs sm:text-sm sm:leading-6 placeholder-background/50">
                                    {{ $comment->body }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
            @endif
        </div>
    </section>
    <x-footer />
</x-layout>
