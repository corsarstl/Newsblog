<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;

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

    public function addBanner($request)
    {
        $this->product_name = $request->product_name;
        $this->price = $request->price;
        $this->seller_site = $request->seller_site;

        if ($request->image_id) {
            $image = $request->image_id;
            $filename = time();
            $location = public_path('images/banners/' . $filename .'.jpg');
            Image::make($image)->resize(250, 250)->save($location);

            $this->image_id = $filename;
        }

        $this->save();
    }
}
