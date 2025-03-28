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
    }//end func

    public function CategoryAdd(){
        return view('admin.categories.categoryAdd');
    }//end func

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
    }//end func


    public function CategoryEdit($id){

            $CategoryEdit = Categories::findOrFail($id);
            return view('admin.categories.categoryEdit', compact('CategoryEdit'));

    }//end func

     public function CategoryUpdateForm(Request $request){

        $request -> validate([

            'categoryName'=>'required',
            'categoryKey'=>'required'

        ],[
            'categoryName.required' =>'Category name is not empty!',
            'categoryKey.required' =>'Category key is not empty!'

        ]);

        $categoryId = $request->id;
        $oldImage = $request->oldImage;


         if($request->file('image')){
            $image = $request->file('image');
            $imagead= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
            Image::make($image)->resize(700,400)->save('upload/categories/'.$imagead); 

            $imageSave='upload/categories/'.$imagead;

            if(file_exists($oldImage)){
                unlink($oldImage);
            }


            Categories::findOrFail($categoryId)->update([
                'categoryName'=>$request->categoryName,
                'categoryUrl'=>str()->slug($request->categoryName),
                'categoryKey'=>$request->categoryKey,
                'description'=>$request->description,
                'imageUrl'=>$imageSave,
            ]);

                 $alertMessage =array(
            'bildirim'=>'Upload with image Success!!',
            'alert-type'=> 'success'
        );
        return Redirect()->route('category.all')->with($alertMessage);

        } //endif

        else{
               Categories::Categories::findOrFail($categoryId)->update([
                'categoryName'=>$request->categoryName,
                'categoryUrl'=>str()->slug($request->categoryName),
                'categoryKey'=>$request->categoryKey,
                'description'=>$request->description,
            ]);

                 $alertMessage =array(
            'bildirim'=>'Upload imageless Success!!',
            'alert-type'=> 'success'
             );
        return Redirect()->route('category.all')->with($alertMessage);
        }//endelse
    }//end func

    public function CategoryDelete($id){
        $categoryId = Categories::findOrFail($id);

        if (!empty($categoryId->imageUrl) && file_exists(public_path($categoryId->imageUrl))) {
        unlink(public_path($categoryId->imageUrl));}


        Categories::findOrFail($id)->delete();

           $alertMessage =array(
            'bildirim'=>'Upload imageless Success!!',
            'alert-type'=> 'success'
             );
        return Redirect()->back()->with($alertMessage);

    }//end func

}//end controller
