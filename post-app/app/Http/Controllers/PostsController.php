<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create() {
        // dd('OK'); //디버깅 할 때 사용
        return view('posts.create');
    }

    public function store(Request $request) {
        // $request->input['title'];
        // $request->input['content'];

        $title = $request->title;
        $content = $request->contnet;

        dd($request);

    }
}
