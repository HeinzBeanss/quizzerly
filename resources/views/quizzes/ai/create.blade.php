<x-layout :pagetitle="'Quizzerly - Use Ai'">
    <x-gradient-background height="h-300" />
    <x-header />

    <section class="relative text-faintest pt-16 pb-20 md:pb-32">
        <div class="mx-4 md:mx-0 md:w-4/5 lg:w-2/3 md:mx-auto flex gap-8">
            <form class="md:order-first" method="POST" action="/quizzes/ai/store" class="min-w-full">
                @csrf
                <input type="text" name="subject" required
                    class="placeholder-background/40 text-background bg-white rounded-md min w-96 pl-4 pr-2 h-10 items-center max-w-60 text-sm appearance-none"
                    placeholder="Enter a subject to generate a quiz!">
                <input type="number" name="numberofquestions"
                    class="placeholder-background/40 text-background bg-white rounded-md min w-96 pl-4 pr-2 h-10 items-center max-w-60 text-sm appearance-none"
                    min=1 max=5 placeholder="How many questions should the quiz have?" value="1">
                                    <input type="number" name="answersperquestion"
                    class="placeholder-background/40 text-background bg-white rounded-md min w-96 pl-4 pr-2 h-10 items-center max-w-60 text-sm appearance-none"
                    min=2 max=5 placeholder="How many answers should each question have?" value="2">
                <button class="text-background text-sm font-thin rounded-md bg-white px-4 py-3">Generate</button>
            </form>
        </div>
    </section>

    <x-footer />
</x-layout>
