@props(['topquizzes'])

<section class="bg-faintest px-4 py-1 rounded-xl mt-4 h-full border-faintest border-solid border-2 box-border">

    <div class="flex flex-col gap-2 my-4 justify-between">
        @foreach ($topquizzes as $topquiz)
            <div class=" text-background rounded-xl">
                <p class="text-lg">{{ $topquiz->name }}</p>
                <div class="flex justify-between">
                    <p class="text-xs"><a class="italic"
                            href="users/{{ $topquiz->user->username }}/profile">{{ $topquiz->user->name }}</a></p>
                    <p class="text-xs">Taken {{ $topquiz->times_taken }} times.</p>
                </div>
            </div>
            @if (!$loop->last)
                <div class="border-b border-solid border-background"></div>
            @endif
        @endforeach
    </div>
</section>
