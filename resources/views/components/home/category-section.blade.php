@props(['categories'])
<section class="pt-20 pb-20 bg-faint w-full text-center">
    <h4 class="text-lg font-medium mb-4 text-surface">Find your subject</h4>
    <h2 class=" text-3xl mb-12 font-bold bg-clip-text text-transparent bg-gradient-to-br from-background to-surface">
        Browse a Specific Category</h2>
    {{-- <div class="slider w-full overflow-hidden relative">
        <div class="slides flex gap-6 transition-transform duration-500 ease-in-out">
            @foreach ($categories as $category)
                <div class="slide border-box min-w-[calc(100%_/_6)] bg-surface rounded-xl relative">
                    <div class="w-full h-full rounded-xl">
                        <a href="/categories/{{ $category->slug }}/quizzes">
                            <img class="w-full h-52 object-cover object-center rounded-xl"
                                src="{{ asset("storage/categories/{$category->thumbnail}") }}" alt="Your alt text" />
                        </a>
                    </div>
                    <div
                        class="absolute top-0 left-0 w-full h-full flex items-center justify-center opacity-100 hover:opacity-0 transition-opacity duration-500">
                        <span
                            class="text-white text-lg bg-black px-4 py-2 bg-opacity-70 rounded-xl">{{ $category->name }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

    <section class="sandbox__carousel">
        <div class="embla">
            <div class="embla__viewport">
                <div class="embla__container">
                    @foreach ($categories as $category)
                        <div class="embla__slide ">
                            <a class="relative" href="/categories/{{ $category->slug }}/quizzes">

                                <img class="embla__slide__img rounded-xl border-2 border-solid border-background"
                                    src="{{ asset("storage/categories/{$category->thumbnail}") }}"
                                    alt="Your alt text" />
                                <div class="absolute bg-surface w-full h-auto"></div>
                            </a>
                            <p>{{ $category->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset('js/carousel.js') }}"></script>

</section>
