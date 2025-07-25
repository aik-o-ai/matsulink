<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $date }} の祭り一覧
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        @forelse ($events as $event)
        <div class="mb-4">
            <a href="{{ route('events.show', $event->id) }}" class="text-blue-600 hover:underline">
                {{ $event->title }}
            </a>
        </div>
        @empty
        <p>この日に登録された祭りはありません。</p>
        @endforelse
        {{-- 戻るリンク --}}
        <div class="mt-8">
            <a href="{{ route('calendar') }}" class="text-blue-600 hover:underline">
                ← カレンダーに戻る
            </a>
        </div>


    </div>

</x-app-layout>