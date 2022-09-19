<div class="m-4 p-4">
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">제목</th>
            <th scope="col">작성자</th>
            <th scope="col">작성일</th>
            <th scope="col">좋아요 수</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
            <td><a href="{{ route('posts.show', ['post'=>$post->id]) }}">{{ $post->title }}</a></td>
            <td>{{ $post->writer->name }}</td>
            <td>{{ $post->created_at->diffForHumans() }}</td>
            <td>{{ $post->likes->count() }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $posts->links() }}
</div>