<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;

class Banner extends Model
{
    protected $fillable = [
        'product_name', 'price', 'seller_site', 'image_name'
    ];

    public static function banners()
    {
        $banners = Banner::all()->shuffle()->take(8);

        return $banners;
    }

    public static function bannersForDashboard()
    {
        $bannersForDashboard = Banner::all()->sortByDesc('id');

        return $bannersForDashboard;
    }

    public function addBanner($request)
    {
        $this->product_name = $request->product_name;
        $this->price = $request->price;
        $this->seller_site = $request->seller_site;

        if ($request->image_name) {
            $image = $request->image_name;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/banners/' . $filename);
            Image::make($image)->resize(250, 250)->save($location);

            $this->image_name = $filename;
        }

        $this->save();
    }
}
