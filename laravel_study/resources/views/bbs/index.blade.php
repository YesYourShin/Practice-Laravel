<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
            <button onclick=location.href="{{ route('posts.create') }}" type="button" class="btn btn-info font-bold hover:bg-blue-700 text-white">
                글쓰기
            </button>
        </div>
    </x-slot>
    <x-post-list :posts="$posts" />
</x-app-layout>