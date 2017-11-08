<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts;
//        return $tag;
        return view('tags.index', compact('posts', 'tag'));
    }
}
