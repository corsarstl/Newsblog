<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function indexPosts($user_name)
    {
        $userId = User::where('name', $user_name)
            ->value('id');

        $comments = Comment::where('user_id', $userId)
            ->orderByDesc('id')
            ->get();

        return view('users.indexPosts', compact('comments', 'user_name'));
    }
}
