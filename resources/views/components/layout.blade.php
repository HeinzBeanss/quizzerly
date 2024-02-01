@props(['pagetitle'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $pagetitle }}</title>
</head>

<body class="bg-background w-full h-full font-sans">

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
                <a href="/login">Log In</a>
                <a href="/register">Register</a>
            @endauth

        </div>
    </header>
    {{ $slot }}

    <x-flash />
</body>

</html>
