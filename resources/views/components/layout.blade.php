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
        <div class="text-words flex gap-6">
            @auth

                <p>Hello,
                    <a href="/profile"> {{ ucwords(auth()->user()->name) }}
                </p>

                <button>Log Out</button>
                </a>
            @else
                <a href="/login">Log In</a>
                <a href="/register">Register</a>
            @endauth

        </div>
    </header>
    {{ $slot }}
</body>

</html>
