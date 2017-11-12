<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'product_name', 'price', 'seller_site'
    ];

    public static function banners()
    {
        $banners = Banner::all()->shuffle()->take(8);

        return $banners;
    }
}
