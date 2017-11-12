<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannersController extends Controller
{
    public function store(Banner $banner)
    {
        $this->validate(request(), [
            'product_name' => 'required|min:5',
            'price' => 'required|integer',
            'seller_site' => 'required',
            'image_id' => 'required|image|mimes:jpg|max:50'
        ]);

        $banner->addBanner(request('product_name', 'price', 'seller_site', 'image_id'));

        return back();
    }
}
