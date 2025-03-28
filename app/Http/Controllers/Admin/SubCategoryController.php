<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SubCategories;
use Image;

class SubCategoryController extends Controller
{
    //


    public function SubCategoryList(){
        
        $subCategories = SubCategories::latest()->get();
        return view('admin.subCategories.subCategoryList',compact('subCategories'));
    }//end func






}//end conrtoller
