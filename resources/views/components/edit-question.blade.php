@props(['index', 'question'])

<div class="flex flex-col bg-white px-4 py-4 rounded-lg gap-2 mb-3">
    <div class="flex justify-between items-center w-full">
        <label for="question_0" class="block text-sm font-medium leading-6 text-background/80">Question Title</label>
    </div>
    <input type="text" name="question[{{ $index }}][0]" required
        class="pl-2 block w-full rounded-md border-0 py-1.5 text-background/80 shadow-sm ring-1 ring-inset ring-background/10 focus:ring-1 focus:outline-0 focus:ring-surface text-xs sm:text-sm sm:leading-6 mb-2 placeholder-background/50"
        value="{{ $question->name }}">

    <label class="block text-sm font-medium leading-6 text-background/80">Answers</label>

    <div id="questionContainerBottom{{ $index }}" class="flex flex-col gap-4">
        @foreach ($question->answers as $answerIndex => $answer)
            <div class="answercontainerdefault flex justify-between items-center gap-3">
                @if ($answerIndex === 0)
                    <img src={{ asset('storage/svg/check.svg') }} alt="checkmark">
                @else
                    <img src={{ asset('storage/svg/x.svg') }} alt="cross">
                @endif

                @if ($answerIndex + 1 === 1 || $answerIndex + 1 === 2)
                    <input type="text" name="question[{{ $index }}][{{ $answerIndex + 1 }}]" required
                        class="max-h-9 pl-2 block w-full rounded-md border-0 py-1.5 text-background/80 shadow-sm ring-1 ring-inset ring-background/10 focus:ring-1 focus:outline-0 focus:ring-surface text-xs sm:text-sm sm:leading-6 placeholder-background/50"
                        value="{{ $answer->name }}">
                @else
                    <input type="text" name="question[{{ $index }}][{{ $answerIndex + 1 }}]" required
                        class="max-h-9 pl-2 block w-full rounded-md border-0 py-1.5 text-background/80 shadow-sm ring-1 ring-inset ring-background/10 focus:ring-1 focus:outline-0 focus:ring-surface text-xs sm:text-sm sm:leading-6 placeholder-background/50"
                        value="{{ $answer->name }}">
                    <img src={{ asset('storage/svg/trash.svg') }} alt="delete answer"
                        class="bg-white transition-all duration-500 ease-out rounded-xl max-h-8 cursor-pointer"
                        type="button" onclick="deleteAnswer({{ $answerIndex + 1 }}, {{ $index }})">
                @endif
            </div>
        @endforeach
    </div>
    <div class="buttoncontainer flex gap-4 mt-4">
        @if ($index === 0)
            <button type="button" onclick="addAnswer({{ $index }})"
                class="px-4 py-2.5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md min-w-40 text-xs sm:text-sm font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow">Add
                Answer</button>
        @else
            <button type="button" onclick="addAnswer({{ $index }})"
                class="px-4 py-2.5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md min-w-40 text-xs sm:text-sm font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow">Add
                Answer</button>
            <button
                class="px-4 py-2.5 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md min-w-40 text-xs sm:text-sm font-light tracking-wide hover:font-normal hover:from-lighter hover:to-background/70 hover:shadow"
                type="button" onclick="deleteQuestion({{ $index }})">Delete Question</button>
        @endif
    </div>


</div>
