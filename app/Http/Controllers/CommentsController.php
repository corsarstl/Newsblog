<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store($category_name, Post $post)
    {
        $post->addComment(request('body'));

//        Comment::create([
//            'body' => request('body'),
//            'post_id' => $post->id
//        ]);

        return back();
    }
}
