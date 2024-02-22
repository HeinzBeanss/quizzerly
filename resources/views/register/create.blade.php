<x-layout :pagetitle="'Quizzerly - Register'">
    <x-gradient-background height="h-screen" />

    <a href="/">
        <h1 class="absolute top-4 left-4 text-4xl text-words hover:text-white transition duration-500 ease-in z-40">
            Quizzerly</h1>
    </a>

    <section class="relative flex flex-col items-center justify-center min-h-screen">
        <div
            class="flex flex-col px-6 py-4 sm:py-12 md:py-20 lg:px-8 bg-white w-4/5 lg:w-3/5 xl:w-2/5 m-x-auto rounded-xl">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
                <h2
                    class="text-center text-2xl font-bold leading-9 tracking-tight bg-clip-text text-transparent bg-gradient-to-br from-background to-surface">
                    Register your
                    Quizzerly account</h2>
            </div>
            <div class="border-t border-background/20 mt-2 sm:mx-auto sm:w-full sm:max-w-sm ">
                <form class="space-y-2 sm:space-y-6" action="/register" method="POST">
                    @csrf

                    <x-input name="name" type="text" placeholder="" />
                    <x-input name="username" type="text" placeholder="" />
                    <x-input name="email" type="email" placeholder="" />
                    <x-input name="password" type="password" placeholder="" />

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-gradient-to-tl from-background to-surface px-3 py-1.5 text-sm leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-background mt-4 sm:mt-0">Register
                            Account</button>
                    </div>
                </form>
                <p class="mt-4 sm:mt-10 text-center text-sm text-gray-500">
                    Already have an account?
                    <a href="/login" class="font-medium leading-6 text-background hover:text-background">Log in
                        here</a>
                </p>
            </div>
        </div>
    </section>
</x-layout>
