<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>
    <div>
        <form action="" method="" class="justify-start">
            <div class="w-1/3">
                <label for="image">자동차 이미지: </label>
                <input type="file" id="image" name="image">
            </div>
            <div class="w-1/3">
                <label for="company">제조회사: </label>
                <input type="text" id="company" name="company">
            </div>
            <div class="w-1/3">
                <label for="name">자동차명: </label>
                <input type="text" id="name" name="name">
            </div>
            <div class="w-1/3">
                <label for="year">제조년도: </label>
                <input type="number" id="year" name="year">
            </div>
            <div class="w-1/3">
                <label for="price">가격: </label>
                <input type="number" id="price" name="price">
            </div>
            <div class="w-1/3">
                <label for="type">차종: </label>
                <input type="text" id="type" name="type">
            </div>
            <div class="w-1/3">
                <label for="style">외형: </label>
                <input type="text" id="style" name="style">
            </div>
        </form>
    </div>
</x-app-layout>