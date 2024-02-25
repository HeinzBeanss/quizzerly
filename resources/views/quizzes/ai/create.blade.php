<x-layout :pagetitle="'Quizzerly - Use Ai'">
    <x-gradient-background height="h-[calc(100vh-2rem)] md:h-[calc(100vh)]" />
    <x-header />

    <section class="relative text-faintest h-[calc(100vh_-_7rem)] md:h-[calc(100vh_-_7.5rem)] pt-4 sm:pt-[calc(20vh)]">
        <div class="mx-4 sm:w-4/5 lg:w-3/4 xl:w-1/2 sm:mx-auto gap-8">
            <h2
                class="text-lg sm:text-3xl font-normal mb-1 text-faintest leading-snug overflow-hidden overflow-ellipsis">
                Generate a quiz with AI</h2>



            <div class="bg-white px-4 py-4 rounded-lg mb-2">
                <form id="aiform" class="md:order-first" method="POST" action="/quizzes/ai/store" class="min-w-full">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="subject"
                                    class="block text-sm font-medium leading-6 text-background/80">Enter a subject /
                                    topic
                                </label>
                                @error('subject')
                                    <p class="text-red-500 text-xs"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mt-1 sm:mt-2">
                                <input id="subject" name="subject" type="text" value="{{ old('subject') }}"
                                    placeholder="Enter a subject to generate a quiz!" required
                                    class="pl-2 block w-full rounded-md border-0 py-1.5 text-background/80 shadow-sm ring-1 ring-inset ring-background/10 placeholder:text-background/50 focus:ring-1 focus:outline-0 focus:ring-surface text-xs sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="flex w-full gap-4">
                            <div class="w-full">
                                <div class="flex items-center justify-between">
                                    <label for="numberofquestions"
                                        class="block text-sm font-medium leading-6 text-background/80">Number of
                                        Questions
                                    </label>
                                    @error('numberofquestions')
                                        <p class="text-red-500 text-xs"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mt-1 sm:mt-2">
                                    <input id="numberofquestions" name="numberofquestions" type="number"
                                        value="{{ old('numberofquestions') ?? 1 }}" min=1 max=8 required
                                        class="pl-3 pr-3 block w-full rounded-md border-0 py-1.5 text-background/80 shadow-sm ring-1 ring-inset ring-background/10 placeholder:text-background/50 focus:ring-1 focus:outline-0 focus:ring-surface text-xs sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="flex items-center justify-between">
                                    <label for="answersperquestion"
                                        class="block text-sm font-medium leading-6 text-background/80">Answers per
                                        Question
                                    </label>
                                    @error('answersperquestion')
                                        <p class="text-red-500 text-xs"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mt-1 sm:mt-2">
                                    <input id="answersperquestion" name="answersperquestion" type="number"
                                        value="{{ old('answersperquestion') ?? 2 }}" min=2 max=4 required
                                        class="pl-3 pr-3 block w-full rounded-md border-0 py-1.5 text-background/80 shadow-sm ring-1 ring-inset ring-background/10 placeholder:text-background/50 focus:ring-1 focus:outline-0 focus:ring-surface text-xs sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <p class="mb-1 text-sm text-white font-thin">Note: Using AI can be unpredictable, it may be both
                inaccurate and inconsistent.</p>
            <div class="bg-white w-min rounded-md mt-4 mx-auto p-4">
                <button id="generatequizbutton"
                    class="mx-auto px-4 text-white py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-60 text-sm sm:text-base font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow"
                    type="button" onclick="loadQuiz()">Generate
                    Quiz</button>
            </div>
            <p id="generatingquiz" class="hidden mt-2 text-center text-sm font-thin">Generating Quiz...</p>
            @error('title')
                <p class="text-red-500 text-sm text-center"> {{ $message }}</p>
            @enderror
        </div>


    </section>

    <x-footer />
</x-layout>
