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
            $imagead= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
            Image::make($image)->resize(636,852)->save('upload/banner/'.$imagead); 

            $imageSave='upload/banner/'.$imagead;

            Banner::findOrFail($bannerId)->update([
                'tittle'=>$request->tittle,
                'subTittle'=>$request->subTittle,
                'url'=>$request->url,
                'videoUrl'=>$request->videoUrl,
                'imageUrl'=>$imageSave,
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
