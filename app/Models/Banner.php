<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'product_name', 'price', 'seller_site', 'image_id'
    ];

    public static function banners()
    {
        $banners = Banner::all()->shuffle()->take(8);

        return $banners;
    }

    public static function bannersForDashboard()
    {
        $bannersForDashboard = Banner::all();

        return $bannersForDashboard;
    }

    public function addBanner($product_name, $price, $seller_site, $image_id)
    {
        $this->create(compact('product_name', 'price', 'seller_site', 'image_id'));
    }

}
