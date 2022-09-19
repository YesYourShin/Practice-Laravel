<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('글수정 폼') }}
            </h2>
            <button onclick=location.href="{{ route('cars.show', ['car'=>$car->id]) }}" type="button" class="btn btn-info font-bold hover:bg-blue-700 text-black">
                상세보기
            </button>
        </div>
    </x-slot>
    <div class="m-4 p-4">
        <form id="editForm" class="row g-3" action="{{ route('cars.update', ['car'=>$car->id])}}"method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="col-12 m-2">
                <label for="제조회사" class="form-label">제조회사</label>
                <input type="text" name="제조회사" class="form-control" id="제조회사" 
                            value="{{ $car->제조회사 }}">
                @error('제조회사')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="자동차명" class="form-label">자동차명</label>
                <input type="text" name="자동차명" class="form-control" id="자동차명" 
                            value="{{ $car->자동차명 }}">
                @error('자동차명')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="제조년도" class="form-label">제조년도</label>
                <input type="integer" name="제조년도" class="form-control" id="제조년도" 
                            value="{{ $car->제조년도 }}">
                @error('제조년도')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="가격" class="form-label">가격</label>
                <input type="integer" name="가격" class="form-control" id="가격" 
                            value="{{ $car->가격 }}">
                @error('가격')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="차종" class="form-label">차종</label>
                <input type="text" name="차종" class="form-control" id="차종" 
                            value="{{ $car->차종 }}">
                @error('차종')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="외형" class="form-label">외형</label>
                <input type="text" name="외형" class="form-control" id="외형" 
                            value="{{ $car->외형 }}">
                @error('외형')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>

            <div class="col-12 m-2">
                @if($car->image)
                <div class="flex items-center">
                    <img class="w-20 h-20 rounded-full" src="{{'/storage/images/'.$car->image}}" 
                        class="card-img-top" alt="my post image">
                        <button onClick="return deleteImage({{ $car->id }})" class="btn btn-danger h-10 mx-2 my-2">이미지 삭제</button>
                    </div>
                    
                @else
                    <span>첨부 이미지 없음</span>
                @endif
                <label for="image" class="form-label">첨부 이미지</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">글 저장</button>
            </div>
        </form>

    </div>
</x-app-layout>