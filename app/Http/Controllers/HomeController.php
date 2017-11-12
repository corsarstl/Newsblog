<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $top5commentators = User::top5commentators();
        $top3posts = Post::top3posts();
        $latest3Posts = Post::latest3posts();

        return view('home.index', compact('categories', 'top5commentators', 'top3posts', 'posts', 'latest3Posts'));
    }
}
