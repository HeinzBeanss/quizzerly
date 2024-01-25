<x-layout :pagetitle="'Quizzerly - Home'">
    <main class="w-full flex flex-col justify-center items-center">
        <section>
            @foreach ($quizzes as $quiz)
                <div class="flex flex-col">
                    <a href="/quizzes/{{ $quiz->slug }}">
                        <h2 class="text-2xl text-teal-100">{{ $quiz->name }}</h2>
                    </a>
                    <p class="mt-2">{{ $quiz->description }}</p>
                    <p>{{ $quiz->user->name }}</p>
                </div>
            @endforeach
        </section>
    </main>
</x-layout>
