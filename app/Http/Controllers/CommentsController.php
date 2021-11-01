<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // http://localhost:8000/post{id}/comments
    // public function index_test(Post $post) {
    //     /*
    //         select *
    //         from comments
    //         where post_id = $post->id
    //     */
    //     // Post 클래스에 comments 함수 구현한 경우
    //     return $post->comments;  
    // }

    public function index($postId)
    {
        /*
        select * from comments where post_id?
        order by created_at desc;
        */

        $comments = Comment::where('post_id', $postId)->latest()->get();
        // dd($comments);
        return $comments;
    }

    // 댓글 등록
    public function store(Request $request, $postId) {
        /*  첫 번째 방법
            Comment 객체를 생성하고,
            이 객체의 멤버변수(프로퍼티)를 설정하고
            save();
            두 번째 방법
            Comment::create([]);
        */
        
        // validation check
        $request->validate(['comment' => 'required']);

        // $request->validate(['email'=>'required|email|unique:comments'])
        // this->validate($request, ['comment' => 'required']);

        // create에 사용할 수 있는 칼럼들은
        // Eloquent 모델 클래스에 protected $fillable에 명시되어 있어야 한다.
        // 
        Comment::create([
            'comment'=> $request -> input('comment'),
            'user_id'=> auth()->user()->id, // 로그인한  사용자의 id
            'post_id'=> $postId,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $commentId)
    {
        //validation check
        $request->validate(['comment' => 'required']);
        // update할 레코드를 먼저 찾고, 그 다음 update
        // select * from comments where id = ?
        $comment = Comment::find($commentId);
        // update comments set comment=? updated_at=now() where id = ?
        $comment->update([
            'comment'=> $request -> input('comment'),
        ]);

        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
            comments 테이블에서 id가 $commentId인 레코드를 삭제
            1. RAW query
            2. DB Query Builder
            3. Eloquent
        */
        // delete from comments where id = ?
        $comment = comment::find($commentId);

        // delete from comments where id = ?
        
        $comment::delete();
    }
}
