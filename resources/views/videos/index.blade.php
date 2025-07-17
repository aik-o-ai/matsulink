<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->title }} の動画一覧
        </h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto space-y-6">


        <div class="py-8 max-w-4xl mx-auto">
            @forelse ($videos as $video)
            <div class="mb-4 p-4 border rounded">
                <p class="font-bold">{{ $video->title }}</p>
                <a href="{{ $video->video_url }}" class="text-blue-600 hover:underline" target="_blank">動画リンクを開く</a>
            </div>
            @empty
            <p>動画がまだ投稿されていません。</p>
            @endforelse

        </div>

    </div>
    {{-- 動画を投稿する --}}
    <div class="mb-4 flex justify-end">
        <a href="{{ route('videos.create', ['event' => $event->id]) }}"
            class="border border-blue-500 text-white bg-blue-500 hover:bg-blue-600 font-bold py-2 px-4 rounded inline-block">
            動画を投稿する
        </a>
    </div>

    {{-- 戻るボタン --}}
    <div>
        <a href="{{ route('events.show', $event->id) }}"
            class="text-blue-600 hover:underline">
            ← 祭りの詳細ページに戻る
        </a>
    </div>
</x-app-layout>