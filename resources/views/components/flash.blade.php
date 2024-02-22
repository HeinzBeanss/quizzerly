@if (session()->has('success'))
    <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100);
    setTimeout(() => show = false, 5000)" x-show="show"
        x-transition:enter="transform ease-out duration-500 transition"
        x-transition:enter-start="opacity-0 -translate-y-10"
        x-transition:leave="transform ease-in duration-300 transition" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 -translate-y-10"
        class="fixed bg-gradient-to-br from-surface to-background text-words text-lg py-4 px-8 rounded-xl top-4 left-1/2 transform -translate-x-1/2 text-sm border border-white z-50 text-center">
        <p>{{ session('success') }}</p>
    </div>
@endif
