<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->title }} の動画一覧
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        @if ($videos->isEmpty())
        {{-- 動画が未投稿の場合 --}}
        <div class="text-center space-y-6">
            <p class="text-gray-700 text-lg mb-4">動画がまだ投稿されていません。</p>

            <a href="{{ route('videos.create', ['event' => $event->id]) }}"
                class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mb-8">
                動画を投稿する
            </a>

            <a href="{{ route('events.show', ['id' => $event->id]) }}"
                class="text-blue-600 hover:underline block">
                ← 祭りの詳細ページに戻る
            </a>
        </div>
        @else
        {{-- 動画がある場合 --}}
        @foreach ($videos as $video)
        <div class="mb-4 p-4 border rounded">
            <p class="font-bold">{{ $video->title }}</p>
            <a href="{{ $video->video_url }}" class="text-blue-600 hover:underline" target="_blank">
                ▶ 動画リンクを開く
            </a>
        </div>
        @endforeach

        <div class="mt-8 flex justify-end">
            <a href="{{ route('videos.create', ['event' => $event->id]) }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                動画を投稿
            </a>
        </div>

        <div class="mt-4">
            <a href="{{ route('events.show', ['id' => $event->id]) }}"
                class="text-blue-600 hover:underline">
                ← 祭りの詳細ページに戻る
            </a>
        </div>
        @endif
    </div>
</x-app-layout>