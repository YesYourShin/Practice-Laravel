<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>
    <div class="">
        <form action="{{ route('cars.store') }}" 
        enctype="multipart/form-data" method="post" 
            class="px-4 py-4 mx-auto justify-center">
            @csrf
            <div class="w-1/3 my-2">
                <label for="image">자동차 이미지: </label>
                <input type="file" id="image" name="image">
                @error('image')
                    <div class="my-4 text-red-400">
                        <span>
                            {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>
            <div class="w-2/3 my-2">
                <label for="company">제조회사: </label>
                <select value="{{ old('company') }}" name="company_id" id="company">
                    @foreach ( $companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('compony')
                    <div class="my-4 text-red-400">
                        <span>
                            {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>
            <div class="w-2/3 my-2">
                <label for="name">자동차명: </label>
                <input value="{{ old('name') }}" type="text" id="name" name="name">
            </div>
            @error('name')
                <div class="my-4 text-red-400">
                    <span>
                        {{ $message }}
                    </span>
                </div>
            @enderror
            <div class="w-2/3 my-2">
                <label for="year">제조년도: </label>
                <input value="{{ old('year') }}" type="number" id="year" name="year">
            </div>
            @error('year')
                <div class="my-4 text-red-400">
                    <span>
                        {{ $message }}
                    </span>
                </div>
            @enderror
            <div class="w-2/3 my-2">
                <label for="price">가격: </label>
                <input value="{{ old('price') }}" type="number" id="price" name="price">
            </div>
            @error('price')
                <div class="my-4 text-red-400">
                    <span>
                        {{ $message }}
                    </span>
                </div>
            @enderror
            <div class="w-2/3 my-2">
                <label for="type">차종: </label>
                <input value="{{ old('type') }}" type="text" id="type" name="type">
            </div>
            @error('type')
                <div class="my-4 text-red-400">
                    <span>
                        {{ $message }}
                    </span>
                </div>
            @enderror
            <div class="w-2/3 my-2">
                <label for="style">외형: </label>
                <input value="{{ old('style') }}" type="text" id="style" name="style">
            </div>
            @error('style')
                <div class="my-4 text-red-400">
                    <span>
                        {{ $message }}
                    </span>
                </div>
            @enderror
            <button class="my-4 px-2 py-2 bg-blue-400 rounded shadow text-white">등록</button>
        </form>
    </div>
</x-app-layout>