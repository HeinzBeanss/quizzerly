<x-layout :pagetitle="ucwords($user->name)">

    <x-gradient-background height="h-200" />
    <x-header />

    <section class="relative text-faintest pt-16 pb-16">
        <div class="w-1/2 mx-auto">
            <h2 class="text-3xl font-normal mb-2 text-faintest">Profile</h2>

            <div class="flex gap-4 bg-white rounded-lg px-4 py-4">
                <img class="rounded-lg  max-w-64"
                    src="{{ asset('storage/profile_pictures/' . auth()->user()->profile_picture) }}"
                    alt="{{ auth()->user()->name }}">


                <div class="flex flex-col justify-between w-full">
                    <div class="profiletop ">
                        <h3 class="text-background text-xl font-normal">
                            {{ ucwords($user->name) }}</h3>
                        <p class="text-background/70 text-sm">Account Username: {{ $user->username }}</p>
                        <p class="text-background/70 text-sm">Account created: {{ $user->created_at->diffForHumans() }}
                        </p>
                        <h3 class="text-background text-xl font-normal mt-2">Quizzes</h3>
                        <p class="text-background/70 text-sm">Total User Quizzes: {{ count($quizzes) }}</p>
                        {{-- Forgive the PHP within the view... --}}
                        @php
                            $totalPlays = 0;
                            foreach ($quizzes as $quiz) {
                                $totalPlays += $quiz->times_taken;
                            }
                        @endphp
                        <p class="text-background/70 text-sm">Total Plays of User Quizzes: {{ $totalPlays }}</p>
                    </div>

                    <div class="profilebuttoncontainer flex gap-4 min-w-full">
                        @if ($user->id === auth()->user()->id)
                            <button
                                class="mt-2 px-4 py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm text-white font-light tracking-wide hover:from-lighter hover:to-background/70 hover:shadow">Change
                                Picture</button>
                            <a href="/quizzes/create"
                                class="mt-2 px-4 py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm text-white font-light tracking-wide hover:from-lighter hover:to-background/70 hover:shadow flex justify-center items-center cursor-pointer">
                                Create Quiz
                            </a>
                            <a class="mt-2 px-4 py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm text-white font-light tracking-wide hover:text-white hover:from-red-400 hover:to-red-900 hover:shadow flex justify-center items-center"
                                href="/users/{{ auth()->user()->username }}/delete">Delete
                                Account
                            </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-faint text-background border-background border-t-0">
        <div class="w-2/3 mx-auto text-white pt-20 pb-4">
            <h2
                class="text-3xl font-medium bg-clip-text text-transparent bg-gradient-to-br from-background/85 to-surface mb-2">
                User Quizzes</h2>

            <div class="lg:grid lg:grid-cols-6 gap-16 mt-4">
                @foreach ($quizzes as $quiz)
                    <x-quiz-profile-preview :quiz="$quiz" :user="$user" />
                @endforeach
            </div>

        </div>
    </section>
</x-layout>
