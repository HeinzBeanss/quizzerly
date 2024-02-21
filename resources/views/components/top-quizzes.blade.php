@props(['topquizzes'])

<section class="min-h-80 border-faintest border-solid border-0">

    <div class="flex flex-col gap-1 justify-between ">
        @foreach ($topquizzes as $topquiz)
            <div
                class="{{ $loop->index % 2 == 0 ? 'bg-white' : 'bg-faint' }} px-3 py-2 text-background/80 rounded-lg h-full">

                <div class="flex justify-between w-full">
                    <div class="flex flex-col w-full">
                        <p class="font-medium overflow-hidden overflow-ellipsis line-clamp-1">
                            <a href="/quizzes/{{ $topquiz->slug }}">{{ $topquiz->name }}</a>
                        </p>
                        <p class="text-xs text-surface"><a class="italic"
                                href="users/{{ $topquiz->user->username }}/profile">{{ $topquiz->user->name }}</a></p>
                    </div>
                    <div class="timestakensection flex flex-col gap-1 items-center min-w-12 w-min">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-award">
                            <circle cx="12" cy="8" r="7"></circle>
                            <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                        </svg>
                        <p class="text-xs w-full line-clamp-1 w-max">{{ $topquiz->times_taken }} plays</p>
                    </div>
                </div>
            </div>
            {{-- @if (!$loop->last)
                <div class="border-b border-solid border-background/40"></div>
            @endif --}}
        @endforeach
    </div>
</section>
