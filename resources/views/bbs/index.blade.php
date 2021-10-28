<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cars') }}
            </h2>
            <button onclick=location.href="{{ route('cars.create') }}" type="button" class="btn btn-info font-bold hover:bg-blue-700 text-black">
                차정보 등록하기
            </button>
        </div>
    </x-slot>
    <div class="m-4 p-4">
        <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">제조회사</th>
                <th scope="col">자동차명</th>
                <th scope="col">제조년도</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cars as $car)
              <tr>
                <td><a href="{{ route('cars.show', ['car'=>$car->id]) }}">{{ $car->제조회사 }}</a></td>
                <td>{{ $car->자동차명 }}</a></td>
                <td>{{ $car->제조년도 }}</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</x-app-layout>