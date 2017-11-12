<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function postsForList()
    {
        return $this->posts()->latest()->limit(5);
    }

    public static function categoriesForMenu()
    {
        $categoriesForMenu = Category::all();

        return $categoriesForMenu;
    }

    public function addCategory($name)
    {
        $this->create(compact('name'));
    }
}
