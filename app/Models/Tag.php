<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function addTag($name)
    {
        $this->create(compact('name'));
    }

    public static function tagsForDashboard()
    {
        $tagsForDashboard = Tag::all();

        return $tagsForDashboard;
    }
}
