<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    @foreach($cars as $car)
    <div>{{ $car->name }}</div>
    @endforeach
</div>