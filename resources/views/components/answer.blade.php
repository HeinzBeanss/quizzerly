@props(['answer', 'questionId', 'index'])

<li>
    <input type="radio" id="{{ $answer->id }}" name="{{ $questionId }}" value="{{ $answer->id }}" class="hidden peer"
        required>
    @if (!session("selectedAnswers.$questionId"))
        <label for="{{ $answer->id }}"
            class="text-xs sm:text-sm pl-2 block w-full rounded-md py-2 text-background/80 ring-1 ring-inset ring-background/10 focus:ring-1 rounded-lg cursor-pointer hover:text-gray-600 hover:bg-faintest hover:text-background hover:bg-white transition duration-500 peer-checked:ring-surface peer-checked:bg-faintest peer-checked:text-surface {{ $index === 0 ? '' : 'mt-3' }}">
        @else
            @if (session("selectedAnswers.$questionId") == $answer->id)
                {{-- this is the selected answer. --}}
                @if (session("correctAnswers.$questionId") == $answer->id)
                    {{-- <p>CORRECT</p> --}}
                    <label for="{{ $answer->id }}"
                        class="text-xs sm:text-sm pl-2 block w-full rounded-md py-2 ring-1 ring-inset ring-green-700 text-green-700 {{ $index === 0 ? '' : 'mt-3' }}">
                    @else
                        {{-- <p>WRONG</p> --}}
                        <label for="{{ $answer->id }}"
                            class="text-xs sm:text-sm pl-2 block w-full rounded-md py-2 ring-1 ring-inset ring-red-500 text-red-400 {{ $index === 0 ? '' : 'mt-3' }}">
                @endif
            @else
                {{-- the answer isn't selected --}}
                @if (session("correctAnswers.$questionId") == $answer->id)
                    {{-- <p>CORRECT BUT NOT SELECTED</p> --}}
                    <label for="{{ $answer->id }}"
                        class="text-xs sm:text-sm pl-2 block w-full rounded-md py-2 ring-1 ring-inset ring-green-700 text-green-700 {{ $index === 0 ? '' : 'mt-3' }}">
                    @else
                        <label for="{{ $answer->id }}"
                            class="text-xs sm:text-sm pl-2 block w-full rounded-md py-2 ring-1 ring-inset ring-faint text-background/80 {{ $index === 0 ? '' : 'mt-3' }}">
                @endif
            @endif
    @endif

    <div class="block">
        <div class="w-full">{{ $index + 1 }}. {{ $answer->name }}</div>
    </div>
    </label>
</li>
