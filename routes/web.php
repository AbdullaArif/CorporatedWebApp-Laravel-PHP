<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});
//Banner
Route::controller(BannerController::class)->group(function(){
    Route::get('banner/edit','HomeBanner')->name('banner');
    Route::post('banner/update','BannerUpdate')->name('banner.update');
});



//Category
Route::controller(CategoryController::class)->group(function(){
    Route::get('category/all','CategoryAll')->name('category.all');

    Route::get('category/add','CategoryAdd')->name('category.add');
    Route::post('category/add.form','CategoryAddForm')->name('category.add.form');

    Route::get('category/edit/{id}','CategoryEdit')->name('category.edit');
    Route::post('category/update.form','CategoryUpdateForm')->name('category.update.form');

    Route::get('category/delete/{id}','CategoryDelete')->name('category.delete');

});



//Sub Category
Route::controller(SubCategoryController::class)->group(function(){
    Route::get('subCategory/list','SubCategoryList')->name('subCategory.list');

    Route::get('category/add','CategoryAdd')->name('category.add');
    Route::post('category/add.form','CategoryAddForm')->name('category.add.form');

    Route::get('category/edit/{id}','CategoryEdit')->name('category.edit');
    Route::post('category/update.form','CategoryUpdateForm')->name('category.update.form');

    Route::get('category/delete/{id}','CategoryDelete')->name('category.delete');

});

















Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
