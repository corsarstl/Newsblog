<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Category $category)
    {
        $posts = Post::where('category_id', '=', ($category->id))->get();

        return view('posts.index', compact('posts', 'category'));
    }

    public function show(Category $category, Post $post)
    {
//        $post = Post::find($post-id);
//        dd($post);

        return view('posts.show', compact('post'));
    }
}
