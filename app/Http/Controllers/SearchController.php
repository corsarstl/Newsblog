<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $tagName = $request->input('tag');

        $posts = Post::whereHas('tags', function ($query) use ($tagName) {
            $query->where('tags.name', 'LIKE', '%' . $tagName . '%');
        })->orderBy('id', 'desc')->paginate(5);

//        dd($posts);

        return view('tags.search', compact('posts', 'tagName'));
    }
}
