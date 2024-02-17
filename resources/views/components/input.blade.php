@props(['name', 'type', 'placeholder'])
<div>
    <div class="flex items-center justify-between">
        <label for="{{ $name }}"
            class="block text-sm font-medium leading-6 text-background/80">{{ ucwords($name) }}
        </label>
        @error($name)
            <p class="text-red-500 text-xs"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mt-2">
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
            autocomplete="{{ $name }}" value="{{ old($name) }}" placeholder="{{ $placeholder }}" required
            class="pl-2 block w-full rounded-md border-0 py-1.5 text-background/80 shadow-sm ring-1 ring-inset ring-faint placeholder:text-background/50 focus:ring-1 focus:outline-0 focus:ring-surface sm:text-sm sm:leading-6">
    </div>
</div>
