@props(['pagetitle'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $pagetitle }}</title>
</head>

<body class="bg-zinc-950 w-full">
    {{ $slot }}
</body>

</html>
