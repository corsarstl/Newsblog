<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function store(Category $category)
    {
        $this->validate(request(), ['name' => 'required|min:2']);
        $category->addCategory(request('name'));

        return back();
    }
}
