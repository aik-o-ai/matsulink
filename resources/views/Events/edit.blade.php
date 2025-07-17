<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">イベント編集</h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto">
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block">タイトル</label>
                <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label for="description" class="block">概要</label>
                <textarea name="description" id="description" class="w-full border rounded p-2">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block">開始日</label>
                <input type="date" name="start_date" value="{{ old('start_date', $event->start_date) }}" class="border p-2 rounded">
            </div>

            <div class="mb-4">
                <label for="end_date" class="block">終了日</label>
                <input type="date" name="end_date" value="{{ old('end_date', $event->end_date) }}" class="border p-2 rounded">
            </div>

            <div class="mb-4">
                <label for="prefecture" class="block">都道府県</label>
                <input type="text" name="prefecture" value="{{ old('prefecture', $event->prefecture) }}" class="border p-2 rounded">
            </div>

            <div class="mb-8">
                <label for="location" class="block">開催場所</label>
                <input type="text" name="location" value="{{ old('location', $event->location) }}" class="border p-2 rounded">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                更新する
            </button>
        </form>
    </div>

    <!-- 戻るリンク -->
    <div class="mb-4">
        <a href="{{ url('/mypage') }}" class="text-blue-600 hover:underline">← 戻る</a>
    </div>
</x-app-layout>