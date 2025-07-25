<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント編集
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        {{-- バリデーションエラー表示 --}}
        @if ($errors->any())
        <div class="mb-6 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- 編集フォーム --}}
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-700">タイトル</label>
                <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}"
                    class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium text-sm text-gray-700">概要</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full border rounded p-2">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block font-medium text-sm text-gray-700">開始日</label>
                <input type="date" name="start_date" value="{{ old('start_date', $event->start_date) }}"
                    class="border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="end_date" class="block font-medium text-sm text-gray-700">終了日</label>
                <input type="date" name="end_date" value="{{ old('end_date', $event->end_date) }}"
                    class="border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="prefecture" class="block font-medium text-sm text-gray-700">都道府県</label>
                <input type="text" name="prefecture" value="{{ old('prefecture', $event->prefecture) }}"
                    class="w-full border rounded p-2" required>
            </div>

            <div class="mb-6">
                <label for="location" class="block font-medium text-sm text-gray-700">開催場所</label>
                <input type="text" name="location" value="{{ old('location', $event->location) }}"
                    class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="latitude" class="block font-medium text-sm text-gray-700">緯度（Latitude）</label>
                <input type="text" name="latitude" id="latitude" value="{{ old('latitude', $event->latitude) }}"
                    class="w-full border rounded p-2" required>
            </div>

            <div class="mb-6">
                <label for="longitude" class="block font-medium text-sm text-gray-700">経度（Longitude）</label>
                <input type="text" name="longitude" id="longitude" value="{{ old('longitude', $event->longitude) }}"
                    class="w-full border rounded p-2" required>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded">
                更新する
            </button>
        </form>

        {{-- 戻るリンク --}}
        <div class="mt-6">
            <a href="{{ url('/mypage') }}" class="text-blue-600 hover:underline">
                ← マイページに戻る
            </a>
        </div>
    </div>
</x-app-layout>