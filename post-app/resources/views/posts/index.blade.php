<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container mt-5 mb-5">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <h1>게시글 리스트</h1>
        @auth
        <a href="/posts/create" class="btn btn-primary">
            게시글 작성
        </a>
        @endauth
        <ul class="list-group mt-3">
            @foreach($posts as $post)
            <li class="list-group-item">
                <span>
                    <a href="{{ route('post.show', ['id'=>$post->id, 'page'=>$posts->currentPage()]) }}">
                    Title : {{ $post->title }}
                    </a>
                </span>
                
                {{-- <div>
                    Content : {{ $post->content }}
                </div>
                <span>written on {{ $post->created_at }}</span> --}}

                <span>written on {{ $post->created_at->diffForHumans() }}
                    {{ $post->count }} 
                    {{ $post->count > 0 ? Str::plural('view', $post->count) : 'view' }}
                </span>
                <hr>
            </li>
            @endforeach
            </ul>
            <div class="mt-5">
                {{ $posts->links() }}
            </div>
    </div>
</body>
</html>