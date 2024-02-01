@props(['categories'])
<div class="w-1/6 mt-11 ">
    Search
    <form method="GET" action="/quizzes" class="mt-4 mb-8">
        <input type="search" name="search" class="rounded-xl w-96 pl-8" placeholder="Search">
    </form>

    <p class="mb-8">or Browse a Category</p>

    {{--  --}}

    <div x-data="{
        open: false,
        toggle(event, option) {
            if (this.open) {
                return this.close();
            }
    
            this.$refs.button.focus();
            this.open = true;
        },
        close(focusAfter) {
            if (!this.open) return;
            this.open = false;
            focusAfter && focusAfter.focus();
        }
    }" class="relative">
        <!-- Button -->
        <button x-ref="button" x-on:click="toggle('Category / Theme')" :aria-expanded="open"
            :aria-controls="$id('dropdown-button')" type="button"
            class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-md shadow">

            <span>Browse a Category</span>
            <!-- Heroicon: chevron-down -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Panel -->
        <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')" style="display: none;"
            class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md">

            @foreach ($categories as $category)
                <a href="/categories/{{ $category->slug }}/quizzes"
                    class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
        <input type="hidden" x-model="selectedOption.id" name="category_id" x-bind:value="selectedOption.id" />
    </div>

    {{--  --}}
    <a href="/quizzes/random" class="px-6 py-4 bg-surface rounded-xl text-xl">Random Quiz</a>
    or

    @auth
        <a href="/quizzes/create" class="px-6 py-4 bg-surface rounded-xl text-xl">Create your own
            quiz!</a>
    @else
        <p class="mt-8">Log in to create a quiz!</p>
    @endauth

    expand this section to fill the most up.

    Remember, less lines, more surface usage with good padding
</div>
