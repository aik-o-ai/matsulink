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
        @if ($event->latitude && $event->longitude)
        <div class="mt-8">
            <h3 class="font-bold text-lg mb-2">地図</h3>
            <div class="w-full h-64">
                <iframe
                    width="100%"
                    height="100%"
                    frameborder="0"
                    style="border:0"
                    src="https://www.google.com/maps?q={{ $event->latitude }},{{ $event->longitude }}&hl=ja&z=15&output=embed"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
        @endif
        <p>
            <a href="{{ route('events.images.index', ['event_id' => $event->id]) }}" class="text-black hover:underline">
                ▶ 写真を見る
            </a>
        </p>
        <p>
            <a href="{{ route('videos.index', ['event' => $event->id]) }}" class="text-black hover:underline">
                ▶ 動画を見る
            </a>
        </p>
        <p>
            <a href="{{ route('calendar') }}" class="text-blue-600 hover:underline mt-4">
                ← カレンダーに戻る
            </a>
        </p>
        <p>
            <a href="{{ route('events.byDate', ['date' =>  $event->start_date]) }}" class="text-blue-600 hover:underline">
                ← この日の祭り一覧に戻る
            </a>
        </p>
    </div>








</x-app-layout>