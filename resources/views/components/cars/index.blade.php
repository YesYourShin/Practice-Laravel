<x-guest-layout>
    <div class="flex flex-col my-10 justify-items-center">
        <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
        <div>
            <a href="{{ route('cars.create') }}">자동차 등록</a>
        </div>
        <div class="w-2/3 mx-auto my-auto">
            <table>
                <tr>
                    <th>제조회사</th>
                    <th>자동차명</th>
                    <th>제조연도</th>
                </tr>
                @foreach($cars as $car)
                <tr>
                    <td>{{$car->company->name}}</td>
                    <td>{{$car->name}}</td>
                    <td>{{$car->year}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        
        <div class="my-5 w-22/3">
            {{ $cars->links() }}
        </div>
    </div>
</x-guest-layout>