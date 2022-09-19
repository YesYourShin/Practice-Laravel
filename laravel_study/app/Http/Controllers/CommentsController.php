<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    // http://localhost:8000/post/{id}/comments
    // public function index_test(Post $post) {
    //     /*
    //         select *
    //         from comments
    //         where post_id = $post->id;
    //     */
    //     // Post 클래스에 comments 함수 구현한 경우...
    //     return $post->comments;
    // }
    public function index($postId) {
        /*
            select * from comments where post_id = ?
            order by created_at desc;
        */
        $comments = Comment::with('user')->where('post_id', $postId)
                        ->latest()->paginate(2);
        return $comments;
    }

    // 댓글 등록
    public function store(Request $request, $postId) {
        /* 첫 번째 방법:
            Comment 객체를 생성하고,
            이 객체의 멤버변수(프로퍼티)를 설정하고
            save();
          두 번째 방법:
            Comment::create([]);
         */
        // validation check
        $request->validate(['comment' =>'required']);
        // $request->validate(['email' =>'required|email|unique:comments'])
        // $this->validate($request, ['comment'=>'required']);

        // create에 사용할 수 있는 칼럼들은
        // Eloquent 모델 클래스에
        // protected $fillable에 명시되어 있어야 한다.
        // mass assignment
        $comment = Comment::create(
            [
                'comment'=> $request->input('comment'),
                'user_id' => auth()->user()->id,  // 로그인한 사용자의 id
                'post_id' => $postId,
            ]);

        return $comment; // 위 create에 의해 삽입된 레코드에 대응된 Eloquent 객체
    }

    public function update(Request $request, $commentId) {
        // validation check
        $request->validate(['comment' =>'required']);
        // update할 레코드를 먼저 찾고, 그 다음 update
        // select * from comments where id = ?
        $comment = Comment::find($commentId);
        // update comments set comment=?, updated_at=now() where id = ?

        $this->authorize('update', $comment);
        // update set comment=? from comments where
        // id = ?
        // 첫번째 ? :$request->input('comment')
        // 두번째 ? : $comment->id


        $comment->update(
            [
                'comment'=> $request->input('comment'),
            ]);

        return $comment;
    }

    public function destroy(Request $request, $commentId) {
        /*
            comments 테이블에서 id가 $commentId인 레코드를 삭제.
            1. RAW query
            2. DB Query Builder
            3. Eloquent
        */

        // select * from comments where id = ?
        $comment = Comment::find($commentId);

        // CommentPolicy를 적용한 권한관리를 하자.
        // 즉 이 요청을 한 사용자가 이 댓글을 삭제할 수 있는지
        // 체크하자.
        // $this->authorize('delete', $comment);
        if($request->user()->can('delete', $comment)) {

        // delete from comments where id  = ?
            $comment->delete();

            return $comment;
        } else { // 로그인한 사용자가 삭제 권한이 없는 경우.
            abort(403);
        }
    }


}
