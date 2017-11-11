<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'image_id', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        $user_id = auth()->user()->id;

        $this->comments()->create(compact('body', 'user_id'));
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function analyticsIfNotLoggedIn()
    {
        $bodyStr = $this->body;
        $bodyArr = explode('. ', $bodyStr);

        $bodyShortFormArr = [];

        for ($i = 0; $i < 5; $i++) {
            $bodyShortFormArr[] = $bodyArr[$i];
        }

        $bodyShortFormStr = implode(". ", $bodyShortFormArr);

        return $bodyShortFormStr;
    }

    public static function latest3posts()
    {
        $latest3Posts = Post::latest()
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        return $latest3Posts;
    }

    public static function top3posts()
    {
        $top3posts = DB::table('posts as p')
            ->select(
                'p.title',
                'cat.name as CategoryName',
                'p.id as PostId',
                DB::raw('COUNT(c.id) as CommentCount'))
            ->join('comments as c', 'p.id', '=', 'c.post_id')
            ->join('categories as cat', 'p.category_id', '=', 'cat.id')
            ->groupBy('p.title', 'CategoryName', 'PostId')
            ->orderBy('CommentCount', 'desc')
            ->take(3)
            ->get();

        return $top3posts;
    }
}
