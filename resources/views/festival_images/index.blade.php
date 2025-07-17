<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->title }} の画像一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($images as $image)
            <div class="bg-white shadow-sm rounded-lg p-4 mb-4">
                <h3 class="font-bold">{{ $image->title }}</h3>
                <img src="{{ $image->image_url }}" alt="{{ $image->title }}" class="w-full max-w-md mt-2">
            </div>
            @endforeach
        </div>
    </div>

    <div class="mb-4 text-right">
        <a href="{{ route('festival.create', ['event_id' => $event->id]) }}"
            class="inline-block bg-green-500 hover:bg-green-600 text-black font-bold py-2 px-4 rounded">
            写真を追加
        </a>
    </div>
    <div class="flex flex-col gap-2 mb-8">
        <a href="{{ route('events.show', ['id' => $event->id]) }}" class="text-blue-600 hover:underline">
            ← 祭りの詳細ページに戻る
        </a>
    </div>



</x-app-layout>