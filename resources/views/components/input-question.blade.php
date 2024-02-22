<div class="flex flex-col bg-white px-4 py-4 rounded-lg gap-2 mb-3">
    <div class="flex justify-between items-center w-full">
        <label for="question_0" class="block text-sm font-medium leading-6 text-background/80">Question Title</label>
    </div>
    <input id="question_0" type="text" name="question[0][0]" placeholder="When did the Battle of Hastings take place?"
        required
        class="pl-2 block w-full rounded-md border-0 py-1.5 text-background/80 shadow-sm ring-1 ring-inset ring-background/10 focus:ring-1 focus:outline-0 focus:ring-surface text-xs sm:text-sm sm:leading-6 mb-2 placeholder-background/50">

    <label class="block text-sm font-medium leading-6 text-background/80">Answers</label>
    <div id="questionContainerBottom0" class="flex flex-col gap-4">
        <div class="answercontainerdefault flex justify-between gap-3">
            <img src={{ asset('storage/svg/check.svg') }} alt="checkmark">
            <input type="text" name="question[0][1]" placeholder="October 14, 1066" required
                class="max-h-24 pl-2 block w-full rounded-md border-0 py-1.5 text-background/80 shadow-sm ring-1 ring-inset ring-background/10 focus:ring-1 focus:outline-0 focus:ring-surface text-xs sm:text-sm sm:leading-6 placeholder-background/50">
        </div>
        <div class="answercontainerdefault flex justify-between items-center gap-3 text-red-400">
            <img src={{ asset('storage/svg/x.svg') }} alt="cross">
            <input type="text" name="question[0][2]" placeholder="May 20th, 1993" required
                class="max-h-24 pl-2 block w-full rounded-md border-0 py-1.5 text-background/80 shadow-sm ring-1 ring-inset ring-background/10 focus:ring-1 focus:outline-0 focus:ring-surface text-xs sm:text-sm sm:leading-6 placeholder-background/50">
        </div>



    </div>
    <button type="button" onclick="addAnswer(0)"
        class="mt-2 px-4 py-2.5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-44 text-xs sm:text-sm font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow">Add
        Answer</button>
</div>
