    <header class="flex justify-around bg-surface py-3 items-center">
        <a href="/home">
            <h1 class="text-3xl text-words">Quizzerly</h1>
        </a>
        <div class="text-words flex divide-x gap-6">

            <a class="pl-8" href="/quizzes">All Quizzes</a>
            <a class="pl-8" href="/quizzes/popular">Popular</a>
            @auth
                <a class="pl-8" href="/users/{{ auth()->user()->username }}/profile"> Profile</a>

                <button class="pl-8">Log Out</button>
            @else
                <a class="pl-8" href="/login">Log In</a>
                <a class="pl-8" href="/register">Register</a>
            @endauth

        </div>
    </header>
