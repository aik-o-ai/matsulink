<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- 全体を1つのラッパーで囲む -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">


            <!-- ログインメッセージ -->
            <p class="text-gray-900 mb-4">ログインしました！</p>

            <!-- マイページ -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ url('/mypage') }}" class="text-purple-600 hover:underline">マイページ</a>
            </div>


            <!-- イベントを探す -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ url('/calendar') }}" class="text-blue-600 hover:underline">イベントを探す</a>
            </div>

            <!-- 投稿する -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ url('/events/create') }}" class="text-green-600 hover:underline">祭りを投稿する</a>
            </div>

        </div>
    </div>
</x-app-layout>