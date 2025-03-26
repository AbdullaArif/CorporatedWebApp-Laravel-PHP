<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    //

    public function CategoryAll(){
        $categoryAll = Categories::latest()->get();
        return view('admin.categories.categoryAll',compact('categoryAll'));
    }
}
