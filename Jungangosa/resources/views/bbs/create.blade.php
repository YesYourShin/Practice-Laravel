<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('글쓰기 폼') }}
            </h2>
            <button onclick=location.href="{{ route('cars.index') }}" type="button" class="btn btn-info font-bold hover:bg-blue-700 text-black">
                목록보기
            </button>
        </div>
    </x-slot>
    <div class="m-4 p-4">
        <form class="row g-3" action="{{ route('cars.store') }}"method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12 m-2">
                <label for="제조회사" class="form-label">제조회사</label>
                <input type="text" name="제조회사" class="form-control" id="제조회사" value="{{ old('제조회사') }}">
                @error('제조회사')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="자동차명" class="form-label">자동차명</label>
                <input type="text" name="자동차명" class="form-control" id="자동차명" value="{{ old('자동차명') }}">
                @error('자동차명')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="제조년도" class="form-label">제조년도</label>
                <input type="integer" name="제조년도" class="form-control" id="제조년도" value="{{ old('제조년도') }}">
                @error('제조년도')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="가격" class="form-label">가격</label>
                <input type="integer" name="가격" class="form-control" id="가격" value="{{ old('가격') }}">
                @error('가격')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="차종" class="form-label">차종</label>
                <input type="text" name="차종" class="form-control" id="차종" value="{{ old('차종') }}">
                @error('차종')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="외형" class="form-label">외형</label>
                <input type="text" name="외형" class="form-control" id="외형" value="{{ old('외형') }}">
                @error('외형')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            
            {{-- <div class="col-12">
                <label for="image" class="form-label">자동차 이미지</label>
                <input type="file" name="image" class="form-control" id="image">
            </div> --}}
            <div class="col-12">
                <button type="submit" class="btn btn-primary">글 저장</button>
            </div>
        </form>
    </div>
</x-app-layout>