@props(['quiz', 'user'])
<div class="col-span-3 flex flex-col">

    <div class="relative text-white bg-surface rounded-lg w-full max-h-64 bg-faintest border-solid border-0 box-border">

        <a href="/quizzes/{{ $quiz->slug }}">
            <div
                class="absolute top-0 left-0 w-full h-full rounded-xl bg-gradient-to-t from-background z-1 hover:opacity-0 transition-opacity duration-700 opacity-50">
            </div>
            <div class="flex absolute bottom-0 right-0 justfify-center items-center">
                @if ($quiz->aigenerated === 1)
                    <div class="flex justify-center h-min items-center p-2 m-2 bg-black/90 rounded-xl">
                        <svg width="2500" height="2500" fill="none" xmlns="http://www.w3.org/2000/svg"
                            stroke-width="1.5" class="h-9 w-9"
                            viewBox="-0.17090198558635983 0.482230148717937 41.14235318283891 40.0339509076386"><text
                                x="-9999" y="-9999">ChatGPT</text>
                            <path
                                d="M37.532 16.87a9.963 9.963 0 0 0-.856-8.184 10.078 10.078 0 0 0-10.855-4.835A9.964 9.964 0 0 0 18.306.5a10.079 10.079 0 0 0-9.614 6.977 9.967 9.967 0 0 0-6.664 4.834 10.08 10.08 0 0 0 1.24 11.817 9.965 9.965 0 0 0 .856 8.185 10.079 10.079 0 0 0 10.855 4.835 9.965 9.965 0 0 0 7.516 3.35 10.078 10.078 0 0 0 9.617-6.981 9.967 9.967 0 0 0 6.663-4.834 10.079 10.079 0 0 0-1.243-11.813zM22.498 37.886a7.474 7.474 0 0 1-4.799-1.735c.061-.033.168-.091.237-.134l7.964-4.6a1.294 1.294 0 0 0 .655-1.134V19.054l3.366 1.944a.12.12 0 0 1 .066.092v9.299a7.505 7.505 0 0 1-7.49 7.496zM6.392 31.006a7.471 7.471 0 0 1-.894-5.023c.06.036.162.099.237.141l7.964 4.6a1.297 1.297 0 0 0 1.308 0l9.724-5.614v3.888a.12.12 0 0 1-.048.103l-8.051 4.649a7.504 7.504 0 0 1-10.24-2.744zM4.297 13.62A7.469 7.469 0 0 1 8.2 10.333c0 .068-.004.19-.004.274v9.201a1.294 1.294 0 0 0 .654 1.132l9.723 5.614-3.366 1.944a.12.12 0 0 1-.114.01L7.04 23.856a7.504 7.504 0 0 1-2.743-10.237zm27.658 6.437l-9.724-5.615 3.367-1.943a.121.121 0 0 1 .113-.01l8.052 4.648a7.498 7.498 0 0 1-1.158 13.528v-9.476a1.293 1.293 0 0 0-.65-1.132zm3.35-5.043c-.059-.037-.162-.099-.236-.141l-7.965-4.6a1.298 1.298 0 0 0-1.308 0l-9.723 5.614v-3.888a.12.12 0 0 1 .048-.103l8.05-4.645a7.497 7.497 0 0 1 11.135 7.763zm-21.063 6.929l-3.367-1.944a.12.12 0 0 1-.065-.092v-9.299a7.497 7.497 0 0 1 12.293-5.756 6.94 6.94 0 0 0-.236.134l-7.965 4.6a1.294 1.294 0 0 0-.654 1.132l-.006 11.225zm1.829-3.943l4.33-2.501 4.332 2.5v5l-4.331 2.5-4.331-2.5V18z"
                                fill="currentColor" />
                        </svg>
                    </div>
                @endif
                <div class="p-2 m-2 flex flex-col justfify-center items-center gap-1 bg-black/90 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-award">
                        <circle cx="12" cy="8" r="7"></circle>
                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                    </svg>
                    <p class="text-xs font-thin">Plays: {{ $quiz->times_taken }}</p>
                </div>

            </div>
        </a>
        <a href="/quizzes/{{ $quiz->slug }}">
            <img class="w-full max-h-64 rounded-lg object-cover" src="{{ asset("storage/{$quiz->thumbnail}") }}"
                alt="Quiz Thumbnail">
        </a>

    </div>
    <div class="flex flex-col justify-start h-full">
        <div class="flex gap-4 justify-between items-center z-10 mt-2 text-background">
            <a href="/quizzes/{{ $quiz->slug }}">
                <h2 class="font-medium text-lg line-clamp-1 leading-snug overflow-hidden overflow-ellipsis max-w-1/2">
                    {{ ucwords($quiz->name) }}</h2>
            </a>
            <p class="text-xs">
                <a href="/users/{{ $quiz->user->username }}/profile" class="italic">{{ $quiz->user->name }}
                </a>
            </p>
        </div>
        <p
            class="z-10 line-clamp-2 overflow-hidden overflow-ellipsis text-background/80 text-sm leading-snug mt-0 md:mt-1">
            {{ $quiz->description }}</p>
    </div>

    @auth
        @if ($user->id == auth()->user()->id)
            <div class="profilequizbuttoncontainer w-full flex flex-row gap-4 justify-between mt-1">
                <a class="mt-2 px-4 py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm text-white font-light tracking-wide hover:from-lighter hover:to-background/70 hover:shadow text-center"
                    href="/quizzes/{{ $quiz->slug }}/edit">Edit
                    Quiz</a>
                <form class="w-full" method="POST" action="/quizzes/{{ $quiz->slug }}">
                    @csrf
                    @method('DELETE')
                    <button
                        class="mt-2 px-4 py-4 bg-gradient-to-br from-lighter/90 via-surface to-background/70 rounded-md w-full text-sm text-white font-light tracking-wide hover:from-lighter hover:to-background/70 hover:shadow">Delete</button>
                </form>
            </div>
        @endif
    @endauth
</div>
