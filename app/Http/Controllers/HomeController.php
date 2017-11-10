<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $users = User::all();
        $posts = Post::all();


//        $latestPosts = DB::table('posts')
//            ->orderBy('created_at', 'desc')
//            ->limit(3)
//            ->get();
        $latestPosts = Post::latest()->orderBy('id', 'desc')->limit(3)->get();

//        dd($latestPosts);

        return view('home.index', compact('categories', 'users', 'posts', 'latestPosts'));
    }
}
