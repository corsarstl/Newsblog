<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts;

        return view('tags.index', compact('posts', 'tag'));
    }

    public function store(Tag $tag)
    {
        $this->validate(request(), ['name' => 'required|min:3']);
        $tag->addTag(request('name'));

        return back();
    }
}
