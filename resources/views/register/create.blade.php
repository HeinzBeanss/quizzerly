<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Quizzerly</title>
</head>

<html class="h-full bg-white">

<body class="h-full">

    <div class="h-screen bg-gray-900 flex justify-center items-center">
        <div class="lg:w-2/5 md:w-1/2 w-2/3">
            <form class="bg-gray-400 p-10 rounded-lg shadow-lg min-w-full" action="/register" method="POST">

                @csrf
                <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Register an Account</h1>

                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="name">Name</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                        name="name" id="name" placeholder="name" />
                </div>

                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="username">Username</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                        name="username" id="username" placeholder="username" />
                </div>
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="email">Email</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                        name="email" id="email" placeholder="quizzerly@email.com" />
                </div>
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="password">Password</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password"
                        name="password" id="password" placeholder="password" />
                </div>

                @error('$name')
                    <p class="text-red-500"> {{ $message }} </p>
                @enderror

                @error('$username')
                    <p class="text-red-500"> {{ $message }} </p>
                @enderror

                @error('$password')
                    <p class="text-red-500"> {{ $message }} </p>
                @enderror

                @error('$name')
                    <p class="text-red-500"> {{ $message }} </p>
                @enderror

                <button type="submit"
                    class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Register</button>
            </form>
        </div>
    </div>

</body>

</html>
