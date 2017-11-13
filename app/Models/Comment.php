<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'user_id', 'body', 'is_approved'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likesCount()
    {
        return $this->likes()->count();
    }

    public static function commentsInPolitics()
    {
        $commentsInPolitics = Post::where('category_id', 7)->orderByDesc('id')->get();

        return $commentsInPolitics;
    }
}
