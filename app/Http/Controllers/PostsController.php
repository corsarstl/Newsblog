<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
//        dd($posts);
//        $posts = $posts->all();
//        $posts = (new \App\Repositories\Posts)->all();
//
//        $posts = Post::latest()
//            ->filter(request(['month', 'year']))
//            ->get();
//
//        return view('posts.index', compact('posts'));
        return view('posts.index');
    }
}
