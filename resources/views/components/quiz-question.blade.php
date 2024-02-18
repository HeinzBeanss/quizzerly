@props(['question', 'questionIndex'])

<h3 class="text-lg text-faintest font-light">{{ $questionIndex + 1 }}. {{ $question->name }}</h3>
<div class="bg-white px-4 py-4 rounded-lg mb-4">
    <ul>
        @foreach ($question->answers as $index => $answer)
            <x-answer :answer="$answer" :questionId="$question->id" :index="$index" />
        @endforeach
    </ul>
</div>
