<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index() {
        // PostsController에 index함수에 내림차순 수정
        // $posts = Post::orderBy('created_at', 'desc')->get();
        // 또는
        // $posts = Post::latest()->get();

        // dd($posts[0]->created_at);

        // 한 페이지에 나오는 개수 설정(latest 붙이면 내림차순)
		// $posts = Post::paginate(2);
		$posts = Post::latest()->paginate(2);

        return view('posts.index', ['posts'=>$posts]);
    }

    public function create() {
        // dd('OK'); //디버깅 할 때 사용
        return view('posts.create');
    }

    public function store(Request $request) {
        // $request->input['title'];
        // $request->input['content'];

        $title = $request->title;
        $content = $request->content;

        $request->validate([
            // 제목 최소 3자
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        // dd($request);

        // DB에 저장
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = Auth::user()->id;
        $post->save();
        // 결과 뷰를 반환
        return redirect('/posts/index');

    }
}
