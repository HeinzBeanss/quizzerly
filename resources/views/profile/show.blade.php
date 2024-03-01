<x-layout :pagetitle="ucwords($user->name)">

    <x-gradient-background height="h-250 md:h-200" />
    <x-header />

    <section class="relative text-faintest pt-16 pb-6 md:pb-16">
        <div class="mx-4 sm:w-4/5 lg:w-3/4 xl:w-1/2 sm:mx-auto gap-8 max-w-screen-xl">
            <h2 class="text-3xl font-normal mb-2 text-faintest">Profile</h2>

            <div class="flex flex-col md:flex-row gap-4 bg-white rounded-lg px-4 py-4">
                <div class="min-w-64 h-64 flex items-center justify-center">
                    <img class="w-full h-full rounded-lg object-cover"
                        src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}"
                        alt="{{ $user->name }}">
                </div>


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

                    <div class="flex flex-col w-full">
                        @error('profile_picture')
                            <p class="text-xs text-red-500"> {{ $errors->first('profile_picture') }}</p>
                        @enderror
                        <div class="profilebuttoncontainer flex gap-4 w-full">
                            @auth
                            @if ($user->id === auth()->user()->id)
                                <form id="profile-form" class="w-full" action="/users/{user:username}/update"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input id="profile-picture-file" type="file" class="hidden w-full"
                                        name="profile_picture" accept="image/*" value="{{ old('profile_picture') }}" />
                                    <label for="profile-picture-file"
                                        class="block mt-2 px-3 py-2 lg:px-4 py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm text-white font-light tracking-wide hover:from-lighter hover:to-background/70 hover:shadow text-center line-clamp-1">Change
                                        Picture</label>
                                </form>
                                {{-- Javascript for Form Submission --}}
                                <script>
                                    const profileFileInput = document.getElementById('profile-picture-file');
                                    profileFileInput.addEventListener('change', function() {
                                        const form = document.getElementById('profile-form');
                                        form.submit();
                                    });
                                </script>
                                <a href="/quizzes/create"
                                    class="mt-2 px-3 py-2 lg:px-4 py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm text-white font-light tracking-wide hover:from-lighter hover:to-background/70 hover:shadow flex justify-center items-center cursor-pointer">
                                    Create Quiz
                                </a>
                                <a class="mt-2 px-3 py-2 lg:px-4 py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm text-white font-light tracking-wide hover:text-white hover:from-red-400 hover:to-red-900 hover:shadow flex justify-center items-center text-center"
                                    href="/users/{{ auth()->user()->username }}/delete">Delete
                                    Account
                                </a>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-faint text-background border-background border-t-0">
        <div class="mx-4 sm:w-4/5 lg:w-3/4 xl:w-1/2 sm:mx-auto gap-8 pt-10 sm:pt-20 pb-4 max-w-screen-xl">
            <h2
                class="text-3xl font-medium bg-clip-text text-transparent bg-gradient-to-br from-background/85 to-surface mb-2">
                User Quizzes</h2>

            <div class="lg:grid lg:grid-cols-6 lg:gap-16 mt-2 flex flex-col gap-8">
                @foreach ($quizzes as $quiz)
                    <x-quiz-profile-preview :quiz="$quiz" :user="$user" />
                @endforeach
            </div>
            <div class="border-b border-background/40 w-full pb-12 mb-8"></div>
            {{ $quizzes->links() }}

        </div>
    </section>

    <x-footer />
</x-layout>
