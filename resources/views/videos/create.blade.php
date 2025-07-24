<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            動画を追加する
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        {{-- バリデーションエラーの表示 --}}
        @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- 動画投稿フォーム --}}
        <form method="POST" action="{{ route('videos.store', ['event' => $event_id]) }}">
            @csrf

            {{-- タイトル（任意） --}}
            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-700">動画のタイトル（任意）</label>
                <input type="text" name="title" id="title" class="border rounded w-full p-2" value="{{ old('title') }}">
            </div>

            {{-- URL（必須） --}}
            <div class="mb-4">
                <label for="video_url" class="block font-medium text-sm text-gray-700">動画のURL（必須）</label>
                <input type="url" name="video_url" id="video_url" class="border rounded w-full p-2" value="{{ old('video_url') }}" required>
                <p class="text-sm text-gray-500 mt-1">YouTubeのリンクまたは動画ファイルのURLを入力してください。</p>
            </div>

            {{-- 投稿ボタン --}}
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">動画を投稿</button>
            </div>
        </form>

        {{-- 戻るリンク --}}
        <div class="mt-4">
            <a href="{{ route('videos.index', ['event' => $event_id]) }}" class="text-blue-600 hover:underline">
                ←動画一覧に戻る
            </a>
        </div>
    </div>
</x-app-layout>