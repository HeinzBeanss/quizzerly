@props(['quiz', 'height'])
<div
    class="flex flex-col py-3 px-5 rounded-xl w-full h-96 relative z-20 bg-faintest border-faintest border-solid border-0 box-border">
    <img class="absolute top-0 left-0 w-full h-full rounded-xl object-cover"
        src="{{ asset("storage/{$quiz->thumbnail}") }}" alt="Quiz Thumbnail">

    <a href="/quizzes/{{ $quiz->slug }}">
        <div
            class="absolute top-0 left-0 w-full h-full rounded-xl bg-gradient-to-t from-background z-1 opacity-85 hover:opacity-0 transition-opacity duration-700">
        </div>
    </a>


    <div class="flex flex-col justify-end h-full text-faintest">
        <div class="flex justify-between items-center z-20">
            <a href="/quizzes/{{ $quiz->slug }}">
                <h2 class="text-2xl">{{ ucwords($quiz->name) }}</h2>
            </a>
            <p class="text-xs">Created by
                <a href="/users/{{ $quiz->user->username }}/profile" class="italic">{{ $quiz->user->name }}
                </a>
            </p>
        </div>
        <p class="mt-2 z-10">{{ $quiz->description }}</p>
    </div>
</div>
