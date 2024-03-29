@props(['question', 'questionIndex'])

<h3 class="text-base sm:text-normal text-background font-base">{{ $questionIndex + 1 }}. {{ $question->name }}</h3>
<div class="bg-faint px-4 py-4 rounded-lg mb-4 drop-shadow-sm">
    <ul>
        @foreach ($question->answers as $index => $answer)
            <x-answer :answer="$answer" :questionId="$question->id" :index="$index" />
        @endforeach
    </ul>
</div>
