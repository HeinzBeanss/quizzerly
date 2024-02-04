@props(['topquizzes'])

<h3 class="text-2xl">Top Quizzes</h3>
<section class="bg-surface px-6 py-4 rounded-xl mt-4">

    <div class="flex flex-col gap-4">
        @foreach ($topquizzes as $topquiz)
            <div class="bg-lighter px-6 py-4 rounded-xl mt-4">

                <p>{{ $topquiz->name }}</p>
                <p>{{ $topquiz->user->name }}</p>
                <p>{{ $topquiz->times_taken }}</p>
            </div>
        @endforeach
    </div>
</section>
