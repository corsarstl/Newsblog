<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function store(Category $category)
    {
        $this->validate(request(), ['name' => 'required|min:3']);

        $category->addCategory(request('name'));

        session()->flash('message', 'A new category was added!');

        return back();
    }
}
