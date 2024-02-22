@props(['quiz', 'height'])
<div
    class="flex flex-col py-3 px-5 rounded-xl w-full h-96 relative z-20 bg-faintest border-faintest border-solid border-0 box-border">
    <img class="absolute top-0 left-0 w-full h-full rounded-xl object-cover"
        src="{{ asset("storage/{$quiz->thumbnail}") }}" alt="Quiz Thumbnail">

    <a href="/quizzes/{{ $quiz->slug }}">
        <div
            class="absolute top-0 left-0 w-full h-full rounded-xl bg-gradient-to-t from-background z-1 opacity-85 hover:opacity-100 transition-opacity duration-500">
        </div>
        <div
            class="absolute top-0 right-0  p-2 m-4 flex flex-col justfify-center items-center gap-1 bg-background/95 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-award">
                <circle cx="12" cy="8" r="7"></circle>
                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
            </svg>
            <p class="text-sm font-thin">Plays: {{ $quiz->times_taken }}</p>
        </div>
    </a>


    <div class="flex flex-col justify-end h-full text-faintest">
        <div class="flex justify-between items-center z-20 gap-2">
            <a href="/quizzes/{{ $quiz->slug }}">
                <h2 class="md:text-2xl sm:text-md line-clamp-1">{{ ucwords($quiz->name) }}</h2>
            </a>
            <p class="hidden sm:block sm:text-xs">Created by
                <a href="/users/{{ $quiz->user->username }}/profile" class="italic">{{ $quiz->user->name }}
                </a>
            </p>
        </div>
        <p class="text-xs md:text-sm mt-1 z-10 font-thin leading-5 line-clamp-2">{{ $quiz->description }}
        </p>
    </div>
</div>
