<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Category $category)
    {
        $posts = Post::all()->where('category_id', '=', ($category->id));

        return view('posts.index', compact('posts', 'category'));
    }
}
