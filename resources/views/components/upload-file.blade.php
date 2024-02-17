<div class="flex items-center justify-center w-full">
    <label for="dropzone-file"
        class="flex flex-col items-center justify-center w-full h-64 border-2 border-surface border-dashed rounded-lg cursor-pointer bg-faintest dark:hover:bg-faint dark:bg-faintest hover:bg-faint dark:border-surface dark:hover:border-surface">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-background dark:text-background" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
            </svg>
            <p class="mb-2 text-sm text-background dark:text-background"><span class="font-semibold">Click to
                    upload</span>
                or drag and drop</p>
            <p class="text-xs text-background dark:text-background">SVG, PNG, JPG or GIF (MAX.
                800x400px)</p>
        </div>
        <input id="dropzone-file" type="file" class="hidden" name="thumbnail" accept="image/*"
            value="{{ old('thumbnail') }}" />
    </label>
</div>
