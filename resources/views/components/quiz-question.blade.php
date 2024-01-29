@props(['question'])

<h2 class="my-4">{{ $question->name }}</h2>
<ul>
    @foreach ($question->answers as $answer)
        <x-answer :answer="$answer" :questionId="$question->id" />
    @endforeach
</ul>
