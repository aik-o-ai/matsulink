<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            写真を投稿する
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('festival.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- 紐づけるイベントID -->
            <input type="hidden" name="event_id" value="{{ $event_id }}">

            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-700">タイトル</label>
                <input type="text" name="title" id="title" class="border rounded w-full p-2" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block font-medium text-sm text-gray-700">画像</label>
                <input type="file" name="image" id="image" accept="image/*" class="border rounded w-full p-2" required>
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">写真をアップロード</button>
            </div>
        </form>

        <div class="mt-4">
            <a href="{{ route('events.images.index', ['event_id' => $event_id]) }}" class="text-blue-600 hover:underline">←写真一覧に戻る</a>
        </div>
    </div>
</x-app-layout>