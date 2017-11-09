<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $users = User::all();
        $posts = Post::all();


//        $latestPosts = DB::table('posts')
//            ->latest()
//            ->limit(3)
//            ->get();

//        dd($top3posts);

        return view('home.index', compact('categories', 'users', 'posts', 'latestPosts'));
    }
}
