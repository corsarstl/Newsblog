<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
//
        for ($i = 0; $i < 5; $i++) {
            $bodyShortFormArr[] = $bodyArr[$i];
        }

        $bodyShortFormStr = implode(". ", $bodyShortFormArr);

        return $bodyShortFormStr;
    }

    public function latest3posts()
    {
        return $this->latest()->limit(3);
    }

    public function top3posts()
    {
//        return $this->orderByDesc($this->comments()->count())->limit(3)->get();
//        return $this->comments()->count()->limit(3)->get();
        return $this->limit(3);
    }
}
