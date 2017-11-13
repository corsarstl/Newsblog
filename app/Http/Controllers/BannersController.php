<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Image;
class BannersController extends Controller
{
    public function store(Request $request)
    {

        $this->validate(request(), [
            'product_name'   => 'required|min:5',
            'price'          => 'required|integer',
            'seller_site'    => 'required',
            'image_name'       => 'required|image|max:500'
        ]);

        $banner = new Banner();

        $banner->addBanner($request);

        session()->flash('message', 'A new banner was added!');

        return back();
    }
}
