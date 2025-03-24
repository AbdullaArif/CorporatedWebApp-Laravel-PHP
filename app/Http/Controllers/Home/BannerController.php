<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function HomeBanner(){
        $homeBanner =Banner::find(1);
        return view('admin.home.banner_edit',compact('homeBanner'));
    }
    //

}
