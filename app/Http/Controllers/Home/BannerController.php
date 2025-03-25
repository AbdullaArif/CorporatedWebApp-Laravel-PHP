<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Image;

class BannerController extends Controller
{
    public function HomeBanner(){
        $homeBanner =Banner::find(1);
        return view('admin.home.banner_edit',compact('homeBanner'));
    }

    public function BannerUpdate(Request $request){
        $bannerId = $request->id;

         if($request->file('image')){
            $image = $request->file('image');
            $imageUrl= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
            Image::make($image)->resize(636,852)->save('upload/banner/'.$imageUrl); 

            $imageSave='upload/banner/'.$imageUrl;

            Banner::findOrFail($bannerId)->update([
                'tittle'=>$request->tittle,
                'subTittle'=>$request->subTittle,
                'url'=>$request->url,
                'videoUrl'=>$request->videoUrl,
                'imageurl'=>$imageSave,
            ]);

                 $alertMessage =array(
            'bildirim'=>'Update with image Success!!',
            'alert-type'=> 'success'
        );
        return Redirect()->back()->with($alertMessage);

        } //endif

        else{
                Banner::findOrFail($bannerId)->update([
                'tittle'=>$request->tittle,
                'subTittle'=>$request->subTittle,
                'url'=>$request->url,
                'videoUrl'=>$request->videoUrl,
                'imageurl'=>$imageSave,
            ]);

                 $alertMessage =array(
            'bildirim'=>'Update imageless Success!!',
            'alert-type'=> 'success'
             );
        return Redirect()->back()->with($alertMessage);
        }//endelse




    }









    //

}
