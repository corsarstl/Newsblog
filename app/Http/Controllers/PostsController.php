<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index($category_name)
    {
        $category = Category::where('name', '=', $category_name);          // ->first()
        $posts = Post::all()->where('category_id', '=', $category->id);

//        dump(Category::where('name','=', $category_name)->toSql());
//        dd($category_name);

        return view('posts.index', compact('posts', 'category'));
    }
    public function show($category_name, Post $post)
    {
        return view('posts.show', compact('category_name', 'post'));
    }
}
