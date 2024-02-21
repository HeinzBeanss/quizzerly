@props(['quiz', 'user'])
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

    @auth
        @if ($user->id == auth()->user()->id)
            <div class="profilequizbuttoncontainer w-full flex flex-row gap-4 justify-between mt-1">
                <a class="mt-2 px-4 py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm text-white font-light tracking-wide hover:from-lighter hover:to-background/70 hover:shadow text-center"
                    href="/quizzes/{{ $quiz->slug }}/edit">Edit
                    Quiz</a>
                <form class="w-full" method="POST" action="/quizzes/{{ $quiz->slug }}">
                    @csrf
                    @method('DELETE')
                    <button
                        class="mt-2 px-4 py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm text-white font-light tracking-wide hover:from-lighter hover:to-background/70 hover:shadow">Delete</button>
                </form>
            </div>
        @endif
    @endauth
</div>
