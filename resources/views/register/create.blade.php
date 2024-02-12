<x-layout :pagetitle="'Quizzerly - Register'">
    <x-gradient-background height="h-screen" />

    <a href="/home">
        <h1 class="absolute top-4 left-4 text-4xl text-words hover:text-white transition duration-500 ease-in z-40">
            Quizzerly</h1>
    </a>

    <section class="relative flex flex-col items-center justify-center min-h-screen">
        <div class=" flex flex-col px-6 py-20 lg:px-8 bg-white w-2/5 m-x-auto rounded-xl">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
                <h2
                    class="text-center text-2xl font-bold leading-9 tracking-tight bg-clip-text text-transparent bg-gradient-to-br from-background to-surface">
                    Register your
                    Quizzerly account</h2>
            </div>
            <div class="border-t border-background/20 mt-2 sm:mx-auto sm:w-full sm:max-w-sm ">
                <form class="space-y-6" action="/register" method="POST">
                    @csrf
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name
                            </label>
                            @error('name')
                                <p class="text-red-500 text-xs"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <input id="name" name="name" type="name" autocomplete="name"
                                value="{{ old('name') }}" required
                                class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-faint placeholder:text-surface focus:ring-1 focus:outline-0 focus:ring-surface sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Username
                            </label>
                            @error('username')
                                <p class="text-red-500 text-xs"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <input id="username" name="username" type="username" autocomplete="username"
                                value="{{ old('username') }}" required
                                class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-faint placeholder:text-surface focus:ring-1 focus:outline-0 focus:ring-surface sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                address</label>
                            @error('email')
                                <p class="text-red-500 text-xs"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email"
                                value="{{ old('email') }}" required
                                class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-faint placeholder:text-surface focus:ring-1 focus:outline-0 focus:ring-surface sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            @error('password')
                                <p class="text-red-500 text-xs"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-faint placeholder:text-surface focus:ring-1 focus:outline-0 focus:ring-inset focus:ring-surface sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-gradient-to-tl from-background to-surface px-3 py-1.5 text-sm leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-background">Register
                            Account</button>
                    </div>
                </form>
                <p class="mt-10 text-center text-sm text-gray-500">
                    Already have an account?
                    <a href="/login" class="font-medium leading-6 text-background hover:text-background">Log in
                        here</a>
                </p>
            </div>
        </div>
    </section>
</x-layout>
