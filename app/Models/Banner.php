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


//        dd($allBanners);
//        $bannersToShow = collect([]);
//        $NbBannersInDb = Banner::all()->count();
//
//
//        for ($i = 0; $i < 9; $i++) {
//            $bannerIdToPush = rand(0, $NbBannersInDb);
//            $bannerToPush = $allBanners->where('id', $bannerIdToPush);
//
//            $bannersToShow->push($bannerToPush);
//        }


    }
}
