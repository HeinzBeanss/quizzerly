<nav id="navbar-desktop"
    class="navbar sticky top-0 w-full z-50 flex justify-between px-8  py-3 items-center backdrop-blur-md transition-all duration-1000">
    <a href="/">
        <h1
            class="text-2xl text-words hover:bg-gradient-to-br from-surface to-words hover:bg-clip-text hover:text-transparent transition duration-200 ease-in ">
            Quizzerly</h1>
    </a>
    <div class="text-words flex gap-2 md:gap-4 lg:gap-4 xl:gap-6 text-sm font-normal ">
        <a class="pl-4 lg:pl-8 hover:underline hover:underline-offset-4 hover:text-white hidden lg:block"
            href="/">HOME</a>
        <a class="pl-4 lg:pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/quizzes">ALL QUIZZES</a>
        <a class="pl-4 lg:pl-8 hover:underline hover:underline-offset-4 hover:text-white hidden lg:block"
            href="/quizzes/popular">POPULAR</a>
        <a class="pl-4 lg:pl-8 hover:underline hover:underline-offset-4 hover:text-white"
            href="/quizzes/random">RANDOM</a>
        @auth
            <a class="pl-4 lg:pl-8 hover:underline hover:underline-offset-4 hover:text-white"
                href="/quizzes/create">CREATE</a>
            <a class="pl-4 lg:pl-8 hover:underline hover:underline-offset-4 hover:text-white"
                href="/quizzes/ai/create">GENERATE WITH AI</a>
        @else
            <a class="pl-4 lg:pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/login">CREATE</a>
            <a class="pl-4 lg:pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/login">GENERATE WITH
                AI</a>
        @endauth


    </div>
    <div class="text-words flex gap-2 text-sm font-normal">
        @auth
            <a class="pl-4 lg:pl-8 hover:underline hover:underline-offset-4 hover:text-white"
                href="/users/{{ auth()->user()->username }}/profile"> Profile</a>
            <form action="/logout" method="POST">
                @method('DELETE')
                @csrf
                <button class="pl-4 lg:pl-8" type="submit">Log Out</button>
            </form>
        @else
            <a class="pl-4 lg:pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/login">Log In</a>
            <a class="pl-4 lg:pl-8 hover:underline hover:underline-offset-4 hover:text-white" href="/register">Register</a>
        @endauth
    </div>
</nav>

{{-- Mobile --}}
<nav id="navbar-mobile"
    class="navbar hidden sticky top-0  w-full z-40 flex justify-between px-3  py-2 items-center backdrop-blur-md transition-all duration-1000 text-faintest">
    <a href="/">
        <h1
            class="text-2xl text-faintest hover:bg-gradient-to-br from-surface to-words hover:bg-clip-text hover:text-transparent transition duration-200 ease-in ">
            Quizzerly</h1>
    </a>
    <svg onclick="openMenu()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-menu cursor-pointer">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
    </svg>
</nav>


{{-- Menu --}}
<div id="nav-menu"
    class="fixed top-0 w-0 h-screen bg-white z-50 overflow-hidden transition-width duration-500 ease-in-out">
    <div class="flex flex-col items-center gap-0 text-background/90 font-normal h-full">
        <div class="menu-top flex justify-between w-full text-surface mb-4">
            <a href="/">
                <h1
                    class="font-normal mt-4 ml-4 text-2xl text-surface hover:bg-gradient-to-br from-surface to-background hover:bg-clip-text hover:text-transparent transition duration-200 ease-in ">
                    Quizzerly</h1>
            </a>
            <svg onclick="closeMenu()" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-x-square cursor-pointer mt-4 mr-4">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="9" y1="9" x2="15" y2="15"></line>
                <line x1="15" y1="9" x2="9" y2="15"></line>
            </svg>
        </div>

        <div class="flex flex-col gap-1 mb-2">
            <h2 class="text-background text-center">Search</h2>
            <form method="GET" action="/quizzes" class="">
                <input type="search" name="search"
                    class="placeholder-background/40 text-background bg-faint rounded pl-4 pr-2 h-10 items-center max-w-40 text-sm appearance-none"
                    placeholder="Find a quiz">
            </form>
            <div class="border-b border-surface/40 mt-3 mb-2"></div>
        </div>
        <div class="nav-text w-full flex flex-col h-full">
            <div class="nav-text-top flex flex-col items-end ">
                <a class="text-sm bg-faint py-2 pr-8 text-end w-full hover:underline hover:underline-offset-4 hover:text-background"
                    href="/">Home</a>
                <a class="text-sm py-2 pr-8 text-end w-full hover:underline hover:underline-offset-4 hover:text-background"
                    href="/quizzes">All Quizzes</a>
                <a class="text-sm bg-faint py-2 pr-8 text-end w-full hover:underline hover:underline-offset-4 hover:text-background"
                    href="/quizzes/popular">Popular</a>
                <a class="text-sm py-2 pr-8 text-end w-full hover:underline hover:underline-offset-4 hover:text-background"
                    href="/quizzes/random">Random</a>
                @auth
                    <a class="text-sm bg-faint py-2 pr-8 text-end w-full hover:underline hover:underline-offset-4 hover:text-background"
                        href="/quizzes/create">Create</a>
                    <a class="text-sm bg-white py-2 pr-8 text-end w-full hover:underline hover:underline-offset-4 hover:text-background"
                        href="/quizzes/ai/create">Create With AI</a>
                @else
                    <a class="text-sm bg-faint py-2 pr-8 text-end w-full hover:underline hover:underline-offset-4 hover:text-background"
                        href="/login">Create</a>
                    <a class="text-sm bg-whitet py-2 pr-8 text-end w-full hover:underline hover:underline-offset-4 hover:text-background"
                        href="/login">Create With AI</a>
                @endauth
            </div>

            <div class="self-center border-b border-surface/40 w-40 mt-4 mb-4"></div>

            <div class="nav-text-bottom flex flex-col items-end">
                @auth
                    <a class="text-sm bg-faint py-2 pr-8 text-end w-full hover:underline hover:underline-offset-4 hover:text-background"
                        href="/users/{{ auth()->user()->username }}/profile"> Profile</a>
                    <form action="/logout" method="POST" class="w-full">
                        @method('DELETE')
                        @csrf
                        <button
                            class="bg-white text-sm py-2 pr-8 text-end w-full hover:underline hover:underline-offset-4 hover:text-background"
                            type="submit">Log Out</button>
                    </form>
                @else
                    <a class="bg-faint text-sm py-2 pr-8 text-end w-full hover:underline hover:underline-offset-4 hover:text-background"
                        href="/login">Log In</a>
                    <a class="bg-white text-sm py-2 pr-8 text-end w-full hover:underline hover:underline-offset-4 hover:text-background"
                        href="/register">Register</a>
                @endauth
            </div>
        </div>
        <a href="https://github.com/HeinzBeanss" class="text-xs text-center w-full text-background mt-auto mb-2">Made
            by David Bean</a>
    </div>

</div>
