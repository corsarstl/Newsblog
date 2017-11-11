<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public static function top5commentators()
    {
        $top5commentators = DB::table('users as u')
            ->select('u.name', DB::raw('COUNT(c.id) as CommentCount'))
            ->join('comments as c', 'u.id', '=', 'c.user_id')
            ->groupBy('u.name')
            ->orderBy('CommentCount', 'desc')
            ->take(5)
            ->get();

        return $top5commentators;
    }
}
