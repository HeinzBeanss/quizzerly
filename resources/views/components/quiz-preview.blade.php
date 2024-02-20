{{-- <div class="col-span-3 flex flex-col bg-faintest py-3 px-3 rounded-lg w-full h-80 bg-faintest ">

    <div class="relative h-3/4">
        <img class="w-full h-full rounded-tr-md rounded-tl-md object-cover"
            src="{{ asset("storage/{$quiz->thumbnail}") }}" alt="Quiz Thumbnail">
        <a href="/quizzes/{{ $quiz->slug }}">
            <div
                class="absolute top-0 left-0 w-full h-full rounded-xl bg-gradient-to-t from-background z-1 hover:opacity-0 transition-opacity duration-700 opacity-40">
            </div>
        </a>
    </div>

    <div class="flex flex-col h-full">
        <div class="flex gap-4 justify-between items-center z-10">
            <a href="/quizzes/{{ $quiz->slug }}">
                <h3 class="text-lg font-normal line-clamp-1 text-background mt-1.5">{{ ucwords($quiz->name) }}</h3>
            </a>
            <p class="text-xs text-background ">
                <a href="/users/{{ $quiz->user->username }}/profile" class="italic">{{ $quiz->user->name }}
                </a>
            </p>
        </div>
        <p class=" z-10 line-clamp-2 overflow-hidden overflow-ellipsis text-background text-sm leading-snug">
            {{ $quiz->description }}</p>
    </div>
</div> --}}

{{-- <div
    class=" col-span-3 flex flex-col bg-surface py-3 px-5 rounded-lg w-full h-72 relative bg-faintest border-faintest border-solid border box-border">

    <img class="absolute top-0 left-0 w-full h-full rounded-lg object-cover"
        src="{{ asset("storage/{$quiz->thumbnail}") }}" alt="Quiz Thumbnail">

    <a href="/quizzes/{{ $quiz->slug }}">
        <div
            class="absolute top-0 left-0 w-full h-full rounded-lg bg-gradient-to-t from-background z-1 opacity-80 hover:opacity-0 transition-opacity duration-700">
        </div>
    </a>

    <div class="flex flex-col justify-end h-full">
        <div class="flex gap-4 justify-between items-center z-10">
            <a href="/quizzes/{{ $quiz->slug }}">
                <h2 class="text-lg line-clamp-1 overflow-hidden overflow-ellipsis">{{ ucwords($quiz->name) }}</h2>
            </a>
            <p class="text-xs">
                <a href="/users/{{ $quiz->user->username }}/profile" class="italic">{{ $quiz->user->name }}
                </a>
            </p>
        </div>
        <p class="z-10 line-clamp-2 overflow-hidden overflow-ellipsis text-sm font-light leading-snug mt-1.5">
            {{ $quiz->description }}</p>
    </div>
</div> --}}

{{-- <div class="col-span-3 flex flex-col">
    <div class=" bg-surface rounded-lg w-full max-h-64 bg-faintest border-faintest border-solid border-2 box-border">

        <img class="w-full h-full rounded-lg object-cover" src="{{ asset("storage/{$quiz->thumbnail}") }}"
            alt="Quiz Thumbnail">
    </div>
    <div class="flex flex-col justify-end h-full">
        <div class="flex gap-4 justify-between items-center z-10">
            <a href="/quizzes/{{ $quiz->slug }}">
                <h2 class="text-lg line-clamp-1 overflow-hidden overflow-ellipsis max-w-1/2 mt-2">
                    {{ ucwords($quiz->name) }}</h2>
            </a>
            <p class="text-xs">
                <a href="/users/{{ $quiz->user->username }}/profile" class="italic">{{ $quiz->user->name }}
                </a>
            </p>
        </div>
        <p class="z-10 line-clamp-2 overflow-hidden overflow-ellipsis text-sm font-light leading-snug mt-1.5">
            {{ $quiz->description }}</p>
    </div>
</div> --}}

{{-- <div class="col-span-3 flex flex-col  ">
    <div class="rounded-lg bg-faintest w-full max-h-64 bg-faintest ">

        <img class="w-full h-full rounded-tl-lg rounded-tr-lg object-cover  border-faintest border-solid border-2 box-border"
            src="{{ asset("storage/{$quiz->thumbnail}") }}" alt="Quiz Thumbnail">
    </div>
    <div class="flex flex-col justify-end h-full bg-faint rounded-br-lg rounded-bl-lg px-3 pb-2">
        <div class="flex gap-4 justify-between items-center z-10 text-background">
            <a href="/quizzes/{{ $quiz->slug }}">
                <h2 class="text-lg line-clamp-1 overflow-hidden overflow-ellipsis max-w-1/2 mt-1">
                    {{ ucwords($quiz->name) }}</h2>
            </a>
            <p class="text-xs">
                <a href="/users/{{ $quiz->user->username }}/profile" class="italic">{{ $quiz->user->name }}
                </a>
            </p>
        </div>
        <p
            class="text-background z-10 line-clamp-2 overflow-hidden overflow-ellipsis text-sm font-normal leading-snug mt-1">
            {{ $quiz->description }}</p>
    </div>
</div> --}}

<div class="col-span-3 flex flex-col">

    <div class="relative bg-surface rounded-lg w-full max-h-64 bg-faintest border-solid border-0 box-border">

        <a href="/quizzes/{{ $quiz->slug }}">
            <div
                class="absolute top-0 left-0 w-full h-full rounded-xl bg-gradient-to-t from-background z-1 hover:opacity-0 transition-opacity duration-700 opacity-50">
            </div>
            <div
                class="absolute bottom-0 right-0  p-2 m-2 flex flex-col justfify-center items-center gap-1 bg-black/90 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-award">
                    <circle cx="12" cy="8" r="7"></circle>
                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                </svg>
                <p class="text-sm font-thin">Plays: {{ $quiz->times_taken }}</p>
            </div>
        </a>
        <a href="/quizzes/{{ $quiz->slug }}">
            <img class="w-full h-full rounded-lg object-cover" src="{{ asset("storage/{$quiz->thumbnail}") }}"
                alt="Quiz Thumbnail">
        </a>

    </div>
    <div class="flex flex-col justify-start h-full">
        <div class="flex gap-4 justify-between items-center z-10 mt-2 text-background">
            <a href="/quizzes/{{ $quiz->slug }}">
                <h2 class="font-medium text-lg line-clamp-1 leading-snug overflow-hidden overflow-ellipsis max-w-1/2">
                    {{ ucwords($quiz->name) }}</h2>
            </a>
            <p class="text-xs">
                <a href="/users/{{ $quiz->user->username }}/profile" class="italic">{{ $quiz->user->name }}
                </a>
            </p>
        </div>
        <p class="z-10 line-clamp-2 overflow-hidden overflow-ellipsis text-background/80 text-sm leading-snug mt-1">
            {{ $quiz->description }}</p>
    </div>
</div>


{{-- <div class="col-span-3 flex flex-col">

    <div class=" bg-surface rounded-tl-lg rounded-tr-lg w-full max-h-64 bg-faintest border-solid border-0 box-border">

        <a href="/quizzes/{{ $quiz->slug }}">
            <img class="w-full h-full rounded-tl-lg rounded-tr-lg object-cover"
                src="{{ asset("storage/{$quiz->thumbnail}") }}" alt="Quiz Thumbnail">
        </a>

    </div>
    <div class="flex flex-col bg-white py-2 px-3 justify-end h-full rounded-bl-lg rounded-br-lg">
        <div class="flex gap-4 justify-between items-center z-10 text-background">
            <a href="/quizzes/{{ $quiz->slug }}">
                <h2 class="text-lg line-clamp-1 leading-snug overflow-hidden overflow-ellipsis max-w-1/2">
                    {{ ucwords($quiz->name) }}</h2>
            </a>
            <p class="text-xs">
                <a href="/users/{{ $quiz->user->username }}/profile" class="italic">{{ $quiz->user->name }}
                </a>
            </p>
        </div>
        <p
            class="z-10 line-clamp-2 overflow-hidden overflow-ellipsis text-background text-sm font-light leading-snug mt-1.5">
            {{ $quiz->description }}</p>
    </div>
</div> --}}
