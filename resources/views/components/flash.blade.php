@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed bg-surface text-white py-2 px-4 rounded-xl top-4 left-1/2 transform -translate-x-1/2 text-sm border border-white">
        <p>{{ session('success') }}</p>
    </div>
@endif
