<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('상세보기') }}
            </h2>
            <button onclick=location.href="{{ route('cars.index') }}" type="button" class="btn btn-info font-bold hover:bg-blue-700 text-black">
                목록보기
            </button>
        </div>
    </x-slot>
    <div class="container">
        <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
        <div class="card" style="width: 100%; margin:10px">
            @if($car->image)
                <img src="{{'/storage/images/'.$car->image}}" class="card-img-top" alt="my post image">
            @else
                <span>첨부 이미지 없음</span>
            @endif
            {{-- <div class="card-body">
                <h5 class="card-제조회사">{{ $post->제조회사 }}</h5>
                <h5 class="card-제조회사">{{ $post->자동차명 }}</h5>
                <h5 class="card-제조회사">{{ $post->제조년도 }}</h5>
                <h5 class="card-제조회사">{{ $post->가격 }}</h5>
                <h5 class="card-제조회사">{{ $post->차종 }}</h5>
                <h5 class="card-제조회사">{{ $post->외형 }}</h5>
              <div> --}}
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">제조회사: {{ $car->제조회사 }}</li>
              <li class="list-group-item">자동차명: {{ $car->자동차명 }}</li>
              <li class="list-group-item">제조년도: {{ $car->제조년도 }}</li>
              <li class="list-group-item">가격: {{ $car->가격 }}</li>
              <li class="list-group-item">차종: {{ $car->차종 }}</li>
              <li class="list-group-item">외형: {{ $car->외형 }}</li>
              <li class="list-group-item">등록일: {{ $car->created_at }}</li>
              <li class="list-group-item">변경일: {{ $car->updated_at }}</li>

            </ul>
            <div class="card-body flex">
              <a href="{{ route('cars.edit', ['car'=>$car->id]) }}" class="card-link">수정하기</a>
              <form id="form" class="ml-4" method="post"  
                  action="{{ route('cars.destroy', ['car'=>$car->id]) }}">
                @csrf
                @method('delete')
                <input type="hidden" name="_method" value="delete">
                <button  type="submit">삭제하기</button>
              </form>
            </div>
          </div>

    </div>
</x-app-layout>