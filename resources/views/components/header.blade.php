    <header class="sticky top-0 w-full z-99 flex justify-between px-8 bg-surface py-3 items-center">
        <a href="/home">
            <h1 class="text-3xl text-words">Quizzerly</h1>
        </a>
        <div class="text-words flex gap-6 text-lg font-normal">
            <a class="pl-8 hover:underline hover:underline-offset-4" href="/home">HOME</a>
            <a class="pl-8 hover:underline hover:underline-offset-4" href="/quizzes">ALL QUIZZES</a>
            <a class="pl-8 hover:underline hover:underline-offset-4" href="/quizzes/popular">POPULAR</a>
            <a class="pl-8 hover:underline hover:underline-offset-4" href="/quizzes/random">RANDOM</a>
            @auth
                <a class="pl-8 hover:underline hover:underline-offset-4" href="/quizzes/create">CREATE</a>
            @else
                <a class="pl-8 hover:underline hover:underline-offset-4" href="/login">CREATE</a>
            @endauth


        </div>
        <div class="text-words flex gap-2 text-lg font-normal">
            @auth
                <a class="pl-8" href="/users/{{ auth()->user()->username }}/profile"> Profile</a>
                <button class="pl-8">Log Out</button>
            @else
                <a class="pl-8" href="/login">Log In</a>
                <a class="pl-8" href="/register">Register</a>
            @endauth
        </div>
    </header>
