<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            カレンダー
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <div id="calendar"></div>
        <p>
            <a href="{{ route('dashboard') }}" class="inline-block bg-gray-100 hover:bg-gray-200 text-blue-600 font-semibold py-2 px-4 rounded mb-4">
                ←戻る
            </a>

        </p>
    </div>



    @vite(['resources/css/app.css', 'resources/js/app.js'])
</x-app-layout>