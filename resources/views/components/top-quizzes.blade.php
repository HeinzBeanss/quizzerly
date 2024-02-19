@props(['topquizzes'])

<section class="bg-white px-4 py-4 rounded-xl min-h-80 border-faintest border-solid border-0">

    <div class="flex flex-col gap-2 my-1 justify-between ">
        @foreach ($topquizzes as $topquiz)
            <div class=" text-background/80 rounded-xl">
                <p class="font-medium">{{ $topquiz->name }}</p>
                <div class="flex justify-between">
                    <p class="text-xs"><a class="italic"
                            href="users/{{ $topquiz->user->username }}/profile">{{ $topquiz->user->name }}</a></p>
                    <p class="text-xs">Taken {{ $topquiz->times_taken }} times.</p>
                </div>
            </div>
            @if (!$loop->last)
                <div class="border-b border-solid border-background/40"></div>
            @endif
        @endforeach
    </div>
</section>
