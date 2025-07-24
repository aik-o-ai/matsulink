<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->title }}
        </h2>
    </x-slot>

    <div class="bg-white rounded shadow p-6 max-w-4xl mx-auto mt-4 mb-6 space-y-4">
        <p class="text-lg"><span class="font-bold">開催期間:</span> {{ $event->start_date }} 〜 {{ $event->end_date }}</p>
        <p class="text-lg"><span class="font-bold">都道府県:</span> {{ $event->prefecture }}</p>
        <p class="text-lg"><span class="font-bold">開催場所:</span> {{ $event->location }}</p>
        <p class="text-lg"><span class="font-bold">概要:</span><br>{{ $event->description }}</p>
        @if ($event->latitude && $event->longitude)
        <div class="mt-8 mb-4">
            <h3 class="font-bold text-lg mb-2">地図</h3>
            <div class="w-full h-64">
                <iframe
                    width="50%"
                    height="100%"
                    frameborder="0"
                    style="border:0"
                    src="https://www.google.com/maps?q={{ $event->latitude }},{{ $event->longitude }}&hl=ja&z=15&output=embed"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
        @endif
        <div class="mb-4">
            <p>
                <a href="{{ route('events.images.index', ['event_id' => $event->id]) }}" class="text-black hover:underline">
                    ▶ 写真を見る
                </a>
            </p>
        </div>
        <div class="mb-8">
            <p>
                <a href="{{ route('videos.index', ['event' => $event->id]) }}" class="text-black hover:underline">
                    ▶ 動画を見る
                </a>
            </p>
        </div>
        <div class="mb-4">
            <p>
                <a href="{{ route('calendar') }}" class="text-blue-600 hover:underline">
                    ← カレンダーに戻る
                </a>
            </p>
        </div>
        <div class="mb-4">
            <p>
                <a href="{{ route('events.byDate', ['date' =>  $event->start_date]) }}" class="text-blue-600 hover:underline">
                    ← この日の祭り一覧に戻る
                </a>
            </p>
        </div>








</x-app-layout>