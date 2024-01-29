@props(['answer', 'questionId'])
{{-- @dd(session("correctAnswers.$questionId")) --}}

{{-- @dd(session('score')) --}}

<li>
    <input type="radio" id="{{ $answer->id }}" name="{{ $questionId }}" value="{{ $answer->id }}" class="hidden peer"
        required>
    @if (!session("selectedAnswers.$questionId"))
        <label for="{{ $answer->id }}"
            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-background border rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 text-white hover:text-background hover:bg-white transition duration-500 peer-checked:border-blue-600 peer-checked:text-blue-600">
        @else
            @if (session("selectedAnswers.$questionId") == $answer->id)
                {{-- this is the selected answer. --}}
                @if (session("correctAnswers.$questionId") == $answer->id)
                    {{-- <p>CORRECT</p> --}}
                    <label for="{{ $answer->id }}"
                        class="inline-flex items-center justify-between w-full p-5 border rounded-lg bg-background border-green-500 text-green">
                    @else
                        {{-- <p>WRONG</p> --}}
                        <label for="{{ $answer->id }}"
                            class="inline-flex items-center justify-between w-full p-5 border rounded-lg bg-background border-red-500 text-red">
                @endif
            @else
                {{-- the answer isn't selected --}}
                @if (session("correctAnswers.$questionId") == $answer->id)
                    {{-- <p>CORRECT BUT NOT SELECTED</p> --}}
                    <label for="{{ $answer->id }}"
                        class="inline-flex items-center justify-between w-full p-5 border rounded-lg bg-background border-green-500 text-green">
                    @else
                        <label for="{{ $answer->id }}"
                            class="inline-flex items-center justify-between w-full p-5 border rounded-lg bg-background border-white-500 text-white">
                @endif
            @endif
    @endif

    <div class="block">
        <div class="w-full">{{ $answer->name }}</div>
    </div>
    </label>
</li>
