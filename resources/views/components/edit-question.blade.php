@props(['index', 'question'])

<div class="flex flex-col px-4 py-4 bg-surface gap-4">
    <div class="flex justify-between w-full">
        <input type="text" name="question[{{ $index }}][0]" required class="w-full rounded-xl"
            value="{{ $question->name }}">
    </div>
    <div id="questionContainerBottom{{ $index }}" class="flex flex-col gap-4">
        @foreach ($question->answers as $answerIndex => $answer)
            @if ($answerIndex + 1 === 1 || $answerIndex + 1 === 2)
                <input type="text" name="question[{{ $index }}][{{ $answerIndex + 1 }}]" required
                    class="max-h-24 pt-3 pb-3 rounded-xl" value="{{ $answer->name }}">
            @else
                <div id="answer[{{ $index }}][{{ $answerIndex + 1 }}]" class="flex justify-between gap-4 w-full">
                    <input type="text" name="question[{{ $index }}][{{ $answerIndex + 1 }}]" required
                        class="w-full transition-all opacity-0 duration-500 ease-out max-h-0 py-0 rounded-xl pl-4 pt-3 pb-3 opacity-100 max-h-12"
                        value="{{ $answer->name }}">
                    <button
                        class="bg-white transition-all opacity-0 duration-500 ease-out max-h-0 py-0 rounded-xl pl-2 pt-3 pb-3 opacity-100 max-h-12"
                        type="button"
                        onclick="deleteAnswer({{ $answerIndex + 1 }}, {{ $index }})">Delete</button>
                </div>
            @endif
        @endforeach
    </div>
    @if ($index === 0)
        <button type="button" onclick="addAnswer({{ $index }})" class="px-8 py-2 bg-surface rounded-xl">Add
            Answer</button>
    @else
        <div class="flex gap-8">
            <button type="button" onclick="addAnswer({{ $index }})" class="px-8 py-2 bg-surface rounded-xl">Add
                Answer</button>
            <button class="px-8 py-2 bg-surface rounded-xl" type="button"
                onclick="deleteQuestion({{ $index }})">Delete Question</button>
        </div>
    @endif

</div>
