<div class="flex flex-col bg-surface py-3 px-5 rounded-xl w-full h-96 relative">
    <img class="absolute top-0 left-0 w-full h-full rounded-xl object-cover"
    @if ($quiz->thumbnail)
        src="{{ asset("storage/{$quiz->thumbnail}") }}"
    @else
        src="{{ asset('storage/quiz-default.jpg') }}"
    @endif
    alt="Quiz Thumbnail">

    <a href="/quizzes/{{ $quiz->slug }}">
        <div
            class="absolute top-0 left-0 w-full h-full rounded-xl bg-gradient-to-t from-black z-1 hover:opacity-0 transition-opacity duration-700">
        </div>
    </a>


    <div class="flex flex-col justify-end h-full">
        <div class="flex justify-between items-center z-10">
            <a href="/quizzes/{{ $quiz->slug }}">
                <h2 class="text-3xl">{{ ucwords($quiz->name) }}</h2>
            </a>
            <p class="text-xs">Created by
                <a href="/users/{{ $quiz->user->username }}" class="italic">{{ $quiz->user->name }}
                </a>
            </p>
        </div>
        <p class="mt-2 z-10">{{ $quiz->description }}</p>
    </div>
</div>
