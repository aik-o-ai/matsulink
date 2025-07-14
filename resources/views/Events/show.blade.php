<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->title }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto space-y-4">
        <p><strong>開催期間:</strong> {{ $event->start_date }} 〜 {{ $event->end_date }}</p>
        <p><strong>都道府県:</strong> {{ $event->prefecture }}</p>
        <p><strong>開催場所:</strong> {{ $event->location }}</p>
        <p><strong>概要:</strong><br>{{ $event->description }}</p>
    </div>
</x-app-layout>