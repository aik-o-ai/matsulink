<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            マイページ
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto space-y-5">
        {{-- プロフィール --}}
        <section class="bg-white p-6 rounded shadow mb-4">
            <h3 class="text-lg font-bold mb-4">【プロフィール】</h3>
            <p class="mb-2"><strong>ニックネーム:</strong> {{ Auth::user()->name }}</p>
            <p><strong>メールアドレス:</strong> {{ Auth::user()->email }}</p>
        </section>

        {{-- 投稿した祭り --}}
        <section class="bg-white p-6 rounded shadow mb-4">
            <h3 class="text-lg font-bold mb-4">【投稿した祭り】</h3>
            @forelse ($events as $event)
            <div class="flex justify-between items-center border-b py-2">
                <a href="{{ route('events.show', ['id' => $event->id]) }}" class="text-blue-700 hover:underline">
                    {{ $event->title }}（{{ $event->start_date }}）
                </a>
                <div class="space-x-2">
                    <a href="{{ route('events.edit', $event->id) }}" class="text-blue-600 hover:underline">編集</a>
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">削除</button>
                    </form>
                </div>
            </div>
            @empty
            <p class="text-gray-600">投稿した祭りはありません。</p>
            @endforelse
        </section>

        {{-- 投稿した写真 --}}
        <section class="bg-white p-6 rounded shadow mb-4">
            <h3 class="text-lg font-bold mb-4">【投稿した写真】</h3>
            @forelse ($images as $image)
            <div class="flex justify-between items-center border-b py-2">
                <span>{{ $image->title }}</span>
                <form action="{{ route('festival_images.destroy', $image->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">削除</button>
                </form>
            </div>
            @empty
            <p class="text-gray-600">投稿した写真はありません。</p>
            @endforelse
        </section>

        {{-- 投稿した動画 --}}
        <section class="bg-white p-6 rounded shadow mb-4">
            <h3 class="text-lg font-bold mb-4">【投稿した動画】</h3>
            @forelse ($videos as $video)
            <div class="flex justify-between items-center border-b py-2">
                <a href="{{ $video->video_url }}" target="_blank" class="text-blue-700 hover:underline">
                    {{ $video->title }}
                </a>
                <form action="{{ route('videos.destroy', $video->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">削除</button>
                </form>
            </div>
            @empty
            <p class="text-gray-600">投稿した動画はありません。</p>
            @endforelse
        </section>

        {{-- 戻るリンク --}}
        <div>
            <a href="{{ url('/dashboard') }}" class="text-blue-600 hover:underline">← ダッシュボードに戻る</a>
        </div>
    </div>
</x-app-layout>