<div>
    <h1>나의 이름은 {{ $name }} 입니다.</h1>
		@foreach ($posts as $post)
    <div class="my-2">
        <p>
            {{ $post->content }}
        </p>
    </div>
    @endforeach
</div>