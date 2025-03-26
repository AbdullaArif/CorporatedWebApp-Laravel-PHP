<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Categories;
use Image;

class CategoryController extends Controller
{
    //

    public function CategoryAll(){
        $categoryAll = Categories::latest()->get();
        return view('admin.categories.categoryAll',compact('categoryAll'));
    }

    public function CategoryAdd(){
        return view('admin.categories.categoryAdd');
    }





     public function CategoryAddForm(Request $request){

        $request -> validate([

            'categoryName'=>'required',
            'categoryKey'=>'required'

        ],[
            'categoryName.required' =>'Category name is not empty!',
            'categoryKey.required' =>'Category key is not empty!'

        ]);



         if($request->file('image')){
            $image = $request->file('image');
            $imagead= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
            Image::make($image)->resize(700,400)->save('upload/categories/'.$imagead); 

            $imageSave='upload/categories/'.$imagead;

            Categories::insert([
                'categoryName'=>$request->categoryName,
                'categoryUrl'=>str()->slug($request->categoryName),
                'categoryKey'=>$request->categoryKey,
                'description'=>$request->description,
                'imageUrl'=>$imageSave,
                'created_at'=>Carbon::now()
            ]);

                 $alertMessage =array(
            'bildirim'=>'Update with image Success!!',
            'alert-type'=> 'success'
        );
        return Redirect()->route('category.all')->with($alertMessage);

        } //endif

        else{
               Categories::insert([
                'categoryName'=>$request->categoryName,
                'categoryUrl'=>str()->slug($request->categoryName),
                'categoryKey'=>$request->categoryKey,
                'description'=>$request->description,
                'created_at'=>Carbon::now()
                
            ]);

                 $alertMessage =array(
            'bildirim'=>'Update imageless Success!!',
            'alert-type'=> 'success'
             );
        return Redirect()->route('category.all')->with($alertMessage);
        }//endelse




    }










}
