<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function store($category_name, Post $post)
    {
        $post->addComment(request('body'));

        return back();
    }

    public function likeComment(Request $request)
    {
        $commentId = $request['commentId'];
        $isLike = $request['isLike'] === 'true';
        $update = false;
        $comment = Comment::find($commentId);

        if (!$comment) {
            return null;
        }

        $user = Auth::user();
        $like = $user->likes()
            ->where('comment_id', $commentId)
            ->first();

        if ($like) {
            $alreadyLike = $like->like;
            $update = true;

            if ($alreadyLike == $isLike) {
                $like->delete();

                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $isLike;
        $like->user_id = $user->id;
        $like->comment_id = $commentId;

        if ($update) {
            $like->update();
        } else {
            $like->save();
        }

        return null;
    }
}
