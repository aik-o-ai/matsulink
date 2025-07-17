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
    <div>
        <a href="{{ route('events.images.index', ['event_id' => $event->id]) }}"
            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded border border-blue-700">

            写真を見る
        </a>
    </div>
    <div class="fixed bottom-4 left-4 z-50 flex flex-col gap-2">
        {{-- カレンダーに戻る --}}
        <a href="{{ route('calendar') }}" class="text-blue-600 hover:underline mt-4">
            ← カレンダーに戻る
        </a>

        {{-- 日付別一覧に戻る（例：2025年5月10日の祭り一覧） --}}
        <a href="{{ route('events.byDate', ['date' => '2025-05-10']) }}" class="text-blue-600 hover:underline">
            ← この日の祭り一覧に戻る
        </a>
    </div>



</x-app-layout>