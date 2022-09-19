<x-app-layout>
  <x-slot name="header">
      <div class="flex justify-between">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('글쓰기 폼') }}
          </h2>
          <button onclick=location.href="{{ route('posts.index') }}" type="button" class="btn btn-info font-bold hover:bg-blue-700 text-white">
              목록보기
          </button>
      </div>
  </x-slot>
<div class="container">
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <div class="card" style="width: 100%; margin:10px">
        @if($post->image)
            <img src="{{'/storage/images/'.$post->image}}" class="card-img-top" alt="my post image">
        @else
            <span>첨부 이미지 없음</span>
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">
              {{ $post->content }}
          </p>
          <div>
            <like-button 
            :post="{{$post}}" 
            :loginuser="{{ auth()->user()->id }}"/>
          </div>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">등록일: {{ $post->created_at->diffForHumans() }}</li>
          <li class="list-group-item">수정일: {{ $post->updated_at->diffForHumans() }}</li>
          <li class="list-group-item">작성자: {{ $post->writer->name }}</li>
        </ul>
        <hr>
        <div class="mt-4">
          <div class="card-body flex">
          <a href="{{ route('posts.edit', ['post'=>$post->id]) }}" class="card-link">수정하기</a>
          <form id="form" class="ml-4" method="post" 
              action="{{ route('posts.destroy', ['post'=>$post->id]) }}">
            @csrf
            @method('delete')
            <input type="hidden" name="_method" value="delete">
            <button type="submit">삭제하기</button>
          </form>
        </div>
      </div>
</div>
</x-app-layout>