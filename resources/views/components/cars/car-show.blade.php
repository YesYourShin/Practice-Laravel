<x-guest-layout>
<div>
    <div class="">
        <div class="w-1/3 my-2">
            <label for="image">자동차 이미지: </label>
            <img src="{{ $car->image }}">
            
        </div>
        <div class="w-2/3 my-2">
            <label for="company">제조회사: </label>
            <input readonly value="{{ $car->company->name }}" id="name">
        </div>
        <div class="w-2/3 my-2">
            <label for="name">자동차명: </label>
            <input readonly value="{{ $car->name }}" type="text" id="name" name="name">
        </div>
        <div class="w-2/3 my-2">
            <label for="year">제조년도: </label>
            <input readonly value="{{ $car->year }}" type="number" id="year" name="year">
        </div>
        <div class="w-2/3 my-2">
            <label for="price">가격: </label>
            <input readonly value="{{ $car->price }}" type="number" id="price" name="price">
        </div>
        <div class="w-2/3 my-2">
            <label for="type">차종: </label>
            <input readonly value="{{ $car->type }}" type="text" id="type" name="type">
        </div>
        <div class="w-2/3 my-2">
            <label for="style">외형: </label>
            <input readonly value="{{ $car->style }}" type="text" id="style" name="style">
        </div>
        <button class="my-4 px-2 py-2 bg-blue-400 rounded shadow text-white">
            <a href="{{ route('cars.index') }}">
                목록보기
            </a>
        </button>
        <button class="my-4 px-2 py-2 bg-green-400 rounded shadow text-white">
            <a href="{{ route('cars.edit', ['car'=>$car->id]) }}">
                수정
            </a>
        </button>
        <button class="my-4 px-2 py-2 bg-red-400 rounded shadow text-white">
            <a href="{{ route('cars.destroy', ['car'=>$car->id]) }}">
                삭제
            </a>
        </button>
    </div>
</div>
</x-guest-layout>