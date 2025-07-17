<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            祭りを投稿する
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

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-700">タイトル</label>
                <input type="text" name="title" id="title" class="border rounded w-full p-2" value="{{ old('title') }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium text-sm text-gray-700">概要</label>
                <textarea name="description" id="description" class="border rounded w-full p-2">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block font-medium text-sm text-gray-700">開始日</label>
                <input type="date" name="start_date" id="start_date" class="border rounded w-full p-2" value="{{ old('start_date') }}" required>
            </div>

            <div class="mb-4">
                <label for="end_date" class="block font-medium text-sm text-gray-700">終了日</label>
                <input type="date" name="end_date" id="end_date" class="border rounded w-full p-2" value="{{ old('end_date') }}" required>
            </div>

            <div class="mb-4">
                <label for="prefecture" class="block font-medium text-sm text-gray-700">都道府県</label>
                <input type="text" name="prefecture" id="prefecture" class="border rounded w-full p-2" value="{{ old('prefecture') }}" required>
            </div>

            <div class="mb-4">
                <label for="location" class="block font-medium text-sm text-gray-700">開催場所</label>
                <input type="text" name="location" id="location" class="border rounded w-full p-2" value="{{ old('location') }}" required>
            </div>

            <div class="mb-4">
                <label for="latitude" class="block font-medium text-sm text-gray-700">緯度</label>
                <input type="number" step="0.0000001" name="latitude" id="latitude" class="border rounded w-full p-2" value="{{ old('latitude') }}" required>
            </div>

            <div class="mb-4">
                <label for="longitude" class="block font-medium text-sm text-gray-700">経度</label>
                <input type="number" step="0.0000001" name="longitude" id="longitude" class="border rounded w-full p-2" value="{{ old('longitude') }}" required>
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">投稿する</button>
            </div>
        </form>

        <div class="mt-4">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">←戻る</a>
        </div>
    </div>
</x-app-layout>