<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandConroller;
use App\Http\Controllers\Backend\CategoryConroller;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\MedicinCategoryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\user\UserIndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 // dd($variable);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin' , 'middleware'=>['admin:admin']] , function(){
    Route::get('/login' , [AdminController::class , 'loginForm']);
    Route::post('/login' , [AdminController::class , 'store'])->name('admin.login');

});



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

// admin rout-----------------------------------------------------------------------

Route::get('/admin/logout' , [AdminController::class , 'destroy'])->name('admin.logout');
Route::get('/admin/profile' , [AdminProfileController::class , 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit' , [AdminProfileController::class , 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store' , [AdminProfileController::class , 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password' , [AdminProfileController::class , 'AdminChangePassword'])->name('admin.changePassword');
Route::post('/admin/change/password' , [AdminProfileController::class , 'AdminUpdateChangePassword'])->name('update.change.password');


// user route==============================================================================================

Route::get('/user' , [IndexController::class , 'index']);
Route::get('/user/logout' , [IndexController::class , 'UserLogout'])->name('user.logout');
Route::get('/user/profile' , [IndexController::class , 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store' , [IndexController::class , 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/profile/changePassword' , [IndexController::class , 'UserProfileChangePassword'])->name('user.changePassword');
Route::post('/user/profile/passwordUpdate' , [IndexController::class , 'UserPasswordUpdate'])->name('user.profile.change_password');


// Admin Brand All route ===================================================================================

Route::prefix('brand')->group(function(){
    Route::get('/view' , [BrandConroller::class , 'BrandView'])->name('all.brand');
    Route::post('/store' , [BrandConroller::class , 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}' , [BrandConroller::class , 'BrandEdit'])->name('brand.edit');
    Route::post('/update' , [BrandConroller::class , 'BrandUpdate'])->name('brand.update');    
    Route::get('/delete/{id}' , [BrandConroller::class , 'BrandDelete'])->name('brand.delete');
});

// Admin category All route ===================================================================================

Route::prefix('category')->group(function(){
    Route::get('/view' , [CategoryConroller::class , 'CategoryView'])->name('all.category');
    Route::post('/store' , [CategoryConroller::class , 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}' , [CategoryConroller::class , 'CategoryEdit'])->name('category.edit');
    Route::post('/update' , [CategoryConroller::class , 'CategoryUpdate'])->name('category.update');   
    Route::get('/delete/{id}' , [CategoryConroller::class , 'CategoryDelete'])->name('category.delete');
    Route::get('/status/{id}' , [CategoryConroller::class , 'CategoryStatus'])->name('category.status');


    // All SubCetagory ==========================================================================
    Route::get('/sub/view' , [SubCategoryController::class , 'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub/store' , [SubCategoryController::class , 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}' , [SubCategoryController::class , 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update' , [SubCategoryController::class , 'SubCategoryUpdate'])->name('subcategory.update');  
    Route::get('/sub/delete/{id}' , [SubCategoryController::class , 'SubCategoryDelete'])->name('subcategory.delete');

    // All Sub-Subcetagory===================================================================================================
    Route::get('/sub/sub/view' , [SubCategoryController::class , 'SubSubCategoryView'])->name('all.subsubcategory');
    Route::post('/sub/sub/store' , [SubCategoryController::class , 'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/sub/edit/{id}' , [SubCategoryController::class , 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/sub/sub/update' , [SubCategoryController::class , 'SubSubCategoryUpdate'])->name('subsubcategory.update');  
    Route::get('/sub/sub/delete/{id}' , [SubCategoryController::class , 'SubSubCategoryDelete'])->name('subsubcategory.delete');

    Route::get('/subcategory/ajax/{category_id}' , [SubCategoryController::class , 'GetSubCategory']);
    Route::get('/editsubcategory/ajax/{category_id}' , [SubCategoryController::class , 'EditGetSubCategory']);
});


// Admin all products =====================================================================================================
Route::prefix('product')->group(function(){
    Route::get('/add' , [ProductController::class , 'AddProduct'])->name('add.product');
    Route::post('/store' , [ProductController::class , 'ProductStore'])->name('product.store');
    Route::get('/manage' , [ProductController::class , 'ProductManage'])->name('product.manage');     
    Route::get('/edit/{id}' , [ProductController::class , 'ProductEdit'])->name('product.edit');
    Route::post('/update' , [ProductController::class , 'ProductUpdate'])->name('product.update');   
    Route::post('/update/image' , [ProductController::class , 'ProductMultiImgUpdate'])->name('product.imageUpdate');  
    Route::post('/update/ThumbImage' , [ProductController::class , 'ProductThumbImgUpdate'])->name('product_mainThamb.imageUpdate');      
    Route::get('/multiple/delete/{id}' , [ProductController::class , 'ProductMultiImgDelete'])->name('product.multiImage');

    Route::get('/subcategory/ajax/{category_id}' , [ProductController::class , 'GetSubCategory']);
    Route::get('/subsubcategory/ajax/{subcategory_id}' , [ProductController::class , 'GetSubSubCategory']);

    Route::get('/inactive/{id}' , [ProductController::class , 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}' , [ProductController::class , 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}' , [ProductController::class , 'ProductDelete'])->name('product.delete');
    Route::get('/preview/{id}' , [ProductController::class , 'ProductPreview'])->name('product.preview');

    
    //edit
    Route::get('/editsubcategory/ajax/{category_id}' , [ProductController::class , 'EditGetSubCategory']);
    Route::get('/editsubsubcategory/ajax/{subcategory_id}' , [ProductController::class , 'EditGetSubSubCategory']);
});


        // Admin All slider manage


Route::prefix('slider')->group(function(){
    Route::get('/view' , [SliderController::class , 'SliderView'])->name('manage.slider');
    Route::post('/store' , [SliderController::class , 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}' , [SliderController::class , 'SliderEdit'])->name('slider.edit');
     Route::post('/update' , [SliderController::class , 'SliderUpdate'])->name('slider.update');   
    Route::get('/delete/{id}' , [SliderController::class , 'SliderDelete'])->name('slider.delete');

    Route::get('/inactive/{id}' , [SliderController::class , 'SliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}' , [SliderController::class , 'SliderActive'])->name('slider.active');

                
});


// Admin  Medicine Category route ===================================================================================

Route::prefix('medicine_category')->group(function(){
    Route::get('/medicine/view' , [MedicinCategoryController::class , 'MedicinCategoryView'])->name('all.medicine_category');
    Route::post('/medicine/store' , [MedicinCategoryController::class , 'MedicineCategoryStore'])->name('medicine_category.store');
    Route::get('/medicine/edit/{id}' , [MedicinCategoryController::class , 'MedicineCategoryEdit'])->name('medicine_category.edit');
    Route::post('/medicine/update' , [MedicinCategoryController::class , 'MedicineCategoryUpdate'])->name('medicine_category.update');   
    Route::get('/medicine/delete/{id}' , [MedicinCategoryController::class , 'MedicineCategoryDelete'])->name('medicine_category.delete');
});

// Admin Medicine product route =======================================================================================

Route::prefix('medicines')->group(function(){

    Route::get('/medicine/add' , [MedicinCategoryController::class , 'AddMedicine'])->name('add.medicine');
    Route::post('/medicine/store' , [MedicinCategoryController::class , 'MedicineStore'])->name('medicine.store');
    Route::get('/medicine/manage' , [MedicinCategoryController::class , 'MedicineManage'])->name('medicine.manage');     
    Route::get('/medicine/edit/{id}' , [MedicinCategoryController::class , 'MedicineEdit'])->name('medicine.edit');
    Route::post('/medicine/update' , [MedicinCategoryController::class , 'MedicineUpdate'])->name('medicine.update');   
    Route::post('/medicine/update/image' , [MedicinCategoryController::class , 'MedicineMultiImgUpdate'])->name('medicine.imageUpdate');  
    Route::post('/medicine/update/ThumbImage' , [MedicinCategoryController::class , 'MedicineThumbImgUpdate'])->name('medicine_mainThamb.imageUpdate');      
    Route::get('/medicine/multiple/delete/{id}' , [MedicinCategoryController::class , 'MedicineMultiImgDelete'])->name('medicine.multiImage');

    Route::get('/medicine/inactive/{id}' , [MedicinCategoryController::class , 'MedicineInactive'])->name('medicine.inactive');
    Route::get('/medicine/active/{id}' , [MedicinCategoryController::class , 'MedicineActive'])->name('medicine.active');
    Route::get('/medicine/delete/{id}' , [MedicinCategoryController::class , 'MedicineDelete'])->name('medicine.delete');
    Route::get('/medicine/preview/{id}' , [MedicinCategoryController::class , 'MedicinePreview'])->name('medicine.preview');
   
}); 


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// =================================================== Frontend All Route =============================================================


// multi language route==================================================

Route::get('/language/english' , [LanguageController::class , 'English'])->name('english.language');
Route::get('/language/hindi' , [LanguageController::class , 'Hindi'])->name('hindi.language');







 //   pharmasy =================================================================


 Route::get('/' , [UserIndexController::class , 'Index']);

 
 
 // Product detail route

Route::get('/product/detail/{id}/{slug}' , [UserIndexController::class , 'ProductDetail'])->name('product.detail');


 

