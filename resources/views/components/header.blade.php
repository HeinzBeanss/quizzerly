    <header id="navbar"
        class="sticky top-0 w-full z-40 flex justify-between px-8  py-3 items-center backdrop-blur-md transition-all duration-1000">
        <a href="/home">
            <h1
                class="text-2xl text-words hover:bg-gradient-to-br from-surface to-words hover:bg-clip-text hover:text-transparent transition duration-200 ease-in ">
                Quizzerly</h1>
        </a>
        <div class="text-words flex gap-6 text-sm font-normal ">
            <a class="pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/home">HOME</a>
            <a class="pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/quizzes">ALL QUIZZES</a>
            <a class="pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/quizzes/popular">POPULAR</a>
            <a class="pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/quizzes/random">RANDOM</a>
            @auth
                <a class="pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/quizzes/create">CREATE</a>
            @else
                <a class="pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/login">CREATE</a>
            @endauth


        </div>
        <div class="text-words flex gap-2 text-sm font-normal">
            @auth
                <a class="pl-8 hover:underline hover:underline-offset-4 hover:text-white"
                    href="/users/{{ auth()->user()->username }}/profile"> Profile</a>
                <form action="/logout" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="pl-8" type="submit">Log Out</button>
                </form>
            @else
                <a class="pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/login">Log In</a>
                <a class="pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/register">Register</a>
            @endauth
        </div>
    </header>
