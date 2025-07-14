<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            カレンダー
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <div id="calendar"></div>
    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</x-app-layout>