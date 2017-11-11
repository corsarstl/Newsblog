<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index($category_name)
    {
        $category_id = Category::where('name', $category_name)
            ->value('id');

        $posts = Post::where('category_id', $category_id)
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('posts.index', compact('posts', 'category_name'));
    }

    public function indexAnalytics()
    {
        $posts = Post::where('is_analytic', 1)
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('posts.analytics', compact('posts'));
    }

    public function show($category_name, Post $post)
    {
        $readingNow = rand(1, 5);

        // take from db
        $readCount = Post::where('id', $post->id)
            ->value('read_count');

        $readCountUpdated = $readCount + $readingNow;

        //save updated value to db
        Post::where('id', $post->id)
            ->update(['read_count' => $readCountUpdated]);

        return view('posts.show', compact('category_name', 'post', 'readingNow', 'readCount'));
    }
}
