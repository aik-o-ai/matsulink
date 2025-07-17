<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            動画を追加する
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto">
        @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('videos.store', ['event' => $event_id]) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label for="title" class="block font-semibold mb-1">動画のタイトル（任意）</label>
                <input type="text" name="title" id="title" class="w-full border-gray-300 rounded" value="{{ old('title') }}">
            </div>

            <div class="mb-4">
                <label for="video_url" class="block font-semibold mb-1">動画のURL（必須）</label>
                <input type="url" name="video_url" id="video_url" class="w-full border-gray-300 rounded" value="{{ old('video_url') }}" required>
                <p class="text-sm text-gray-500 mt-1">YouTubeのリンクまたは動画ファイルのURLを入力してください</p>
            </div>

            <form method="POST" action="#">
                @csrf
                <div class="mb-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black
                     font-bold py-2 px-4 rounded">
                        投稿する
                    </button>
                </div>
            </form>

            <div class="text-left">
                <a href="{{ route('videos.index', ['event' => $event_id]) }}" class="text-blue-600 hover:underline">
                    ← 一覧に戻る
                </a>
            </div>

        </form>
    </div>
</x-app-layout>