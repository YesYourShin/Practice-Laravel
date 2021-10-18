<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /*
        User - Comment (1:N)
    */

    public function user() {
        // Comment 입장에서 연결된 User를 찾을 때
        // belongsTo 관계 메서드를 통해서
        // 연결시켜주면 된다.
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
        /*
            SELECT *
            FROM USERS
            WHERE id = $this.user_id
        */

    }

}
