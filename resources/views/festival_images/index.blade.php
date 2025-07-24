<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->title }} の画像一覧
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto px-4">
        @if ($images->isEmpty())
        <div class="text-center">
            <p class="text-gray-600 text-lg mb-6">画像がまだ投稿されていません。</p>

            <a href="{{ route('festival.create', ['event_id' => $event->id]) }}"
                class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4">
                写真を追加
            </a>

            <div>
                <a href="{{ route('events.show', ['id' => $event->id]) }}" class="text-blue-600 hover:underline">
                    ← 祭りの詳細ページに戻る
                </a>
            </div>
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($images as $image)
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <img src="{{ $image->image_url }}"
                    alt="{{ $image->title }}"
                    class="w-full aspect-video object-cover rounded-t-lg">
                <div class="p-2">
                    <p class="text-right text-sm font-bold">{{ $image->title }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8 flex justify-end">
            <a href="{{ route('festival.create', ['event_id' => $event->id]) }}"
                class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                写真を追加
            </a>
        </div>

        <div class="mt-4">
            <a href="{{ route('events.show', ['id' => $event->id]) }}" class="text-blue-600 hover:underline">
                ← 祭りの詳細ページに戻る
            </a>
        </div>
        @endif
    </div>
</x-app-layout>