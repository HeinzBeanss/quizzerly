<x-layout :pagetitle="ucwords($user->name)">

    <x-gradient-background height="h-full" />
    <x-header />

    <section class="relative text-faintest pt-16 pb-32">
        <div class="w-1/2 mx-auto">
            <div class="w-full">

                <h2 class="text-3xl font-normal mb-2 text-faintest">Profile</h2>

                <div class="flex justify-between">
                    <img src="" alt="">


                    <div class="flex flex-col">
                        <h2>{{ $user->name }}</h2>
                        <p>Username: {{ $user->username }}</p>
                        <p>Account created: {{ $user->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                <h1>Quizzes ({{ count($quizzes) }})</h1>

                <div class="lg:grid lg:grid-cols-6 gap-4 mt-4">
                    @foreach ($quizzes as $quiz)
                        <x-quiz-preview :quiz="$quiz" />
                        @auth
                            @if ($user->id == auth()->user()->id)
                                <a class="bg-surface px-6 py-4 rounded-xl" href="/quizzes/{{ $quiz->slug }}/edit">Edit
                                    Quiz</a>
                                <form method="POST" action="/quizzes/{{ $quiz->slug }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-surface px-6 py-4 rounded-xl">Delete</button>
                                </form>
                            @endif
                        @endauth
                    @endforeach

                </div>

            </div>
        </div>
    </section>
</x-layout>
