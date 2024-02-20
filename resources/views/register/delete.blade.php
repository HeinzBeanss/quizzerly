<x-layout :pagetitle="'Account Delete'">
    <x-gradient-background height="h-screen" />
    <x-header />

    <section class="relative text-faintest pt-16 pb-32">
        <div class="w-1/2 mx-auto text-background bg-white rounded-lg py-4 px-4">
            <form class="flex flex-row gap-20 items-center justify-center" action="/users/{{ auth()->user()->username }}"
                method="POST">
                @csrf
                @method('DELETE')
                <label class="text-center" for="deleteuser">Are you sure you want to delete your account,
                    {{ ucwords(auth()->user()->name) }}?</label>
                <input id="deleteuser" type="hidden" name="user" value="{{ auth()->user()->username }}">

                <button type="submit"
                    class="mt-2 px-4 py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-60 text-sm text-white font-light tracking-wide hover:from-lighter hover:to-background/70 hover:shadow flex justify-center items-center hover:text-white hover:from-red-400 hover:to-red-900">Yes,
                    Delete My Account</button>
            </form>

        </div>

        <div class="w-full mx-auto text-center mt-8 hover:underline underline-offset-2"><a href="/"
                class="text-white text-center">No, take me back
                to
                safety!</a>
        </div>

    </section>
    <x-footer />
</x-layout>
