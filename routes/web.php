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
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\user\WhishListController;
use App\Http\Controllers\user\MyCartController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\user\checkOutController;
use App\Http\Controllers\user\StripeController;
use App\Http\Controllers\user\CashController;
use App\Http\Controllers\Frontend\AllUserController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\RepotsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Frontend\ViewBlogController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Frontend\ReviewController;



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


Route::middleware(['auth:admin'])->group(function(){



    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard')->middleware('auth:admin');

    // admin rout-----------------------------------------------------------------------

    Route::get('/admin/logout' , [AdminController::class , 'destroy'])->name('admin.logout');
    Route::get('/admin/profile' , [AdminProfileController::class , 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit' , [AdminProfileController::class , 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store' , [AdminProfileController::class , 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password' , [AdminProfileController::class , 'AdminChangePassword'])->name('admin.changePassword');
    Route::post('/admin/change/password' , [AdminProfileController::class , 'AdminUpdateChangePassword'])->name('update.change.password');


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

        
    // Admin All slider manage==================================================================================


    Route::prefix('slider')->group(function(){
        Route::get('/view' , [SliderController::class , 'SliderView'])->name('manage.slider');
        Route::post('/store' , [SliderController::class , 'SliderStore'])->name('slider.store');
        Route::get('/edit/{id}' , [SliderController::class , 'SliderEdit'])->name('slider.edit');
        Route::post('/update' , [SliderController::class , 'SliderUpdate'])->name('slider.update');   
        Route::get('/delete/{id}' , [SliderController::class , 'SliderDelete'])->name('slider.delete');

        Route::get('/inactive/{id}' , [SliderController::class , 'SliderInactive'])->name('slider.inactive');
        Route::get('/active/{id}' , [SliderController::class , 'SliderActive'])->name('slider.active');

                    
    });

    Route::prefix('contact')->group(function(){
        Route::get('/view' , [SliderController::class , 'ContactView'])->name('manage.contact');
        Route::get('/show/{id}' , [SliderController::class , 'ContactShow'])->name('contact.show');
        Route::get('/reply/{id}' , [SliderController::class , 'ContactReply'])->name('contact.reply');   
        Route::get('/delete/{id}' , [SliderController::class , 'ContactDelete'])->name('contact.delete');
    
        Route::post('/email' , [SliderController::class , 'ContactEmail'])->name('contact.email');
        Route::post('/send/email' , [SliderController::class , 'SendGmail'])->name('contact.sendemail');

        Route::get('/sendemail' , [SliderController::class , 'SendEmail'])->name('send.email');
                    
    });

            
    

        
    // Coupon All Coupon manage==================================================================================

    Route::prefix('coupon')->group(function(){
        Route::get('/view' , [CouponController::class , 'CouponView'])->name('manage.coupon');
        Route::post('/store' , [CouponController::class , 'CouponStore'])->name('coupon.store');
        Route::get('/edit/{id}' , [CouponController::class , 'CouponEdit'])->name('coupon.edit');
        Route::post('/update' , [CouponController::class , 'CouponUpdate'])->name('coupon.update');   
        Route::get('/delete/{id}' , [CouponController::class , 'CouponDelete'])->name('coupon.delete');

        Route::get('/inactive/{id}' , [CouponController::class , 'CouponInactive'])->name('coupon.inactive');
        Route::get('/active/{id}' , [CouponController::class , 'CouponActive'])->name('coupon.active');

                    
    });

        
    // Admin All Shippin area manage==================================================================================

    Route::prefix('shipping')->group(function(){
        Route::get('/division/view' , [ShippingAreaController::class , 'ShippingView'])->name('manage.division');
        Route::post('/division/store' , [ShippingAreaController::class , 'DivisionStore'])->name('division.store');
        Route::get('/division/edit/{id}' , [ShippingAreaController::class , 'DivisionEdit'])->name('division.edit');
        Route::post('/division/update' , [ShippingAreaController::class , 'DivisionUpdate'])->name('division.update');   
        Route::get('/division/delete/{id}' , [ShippingAreaController::class , 'DivisionDelete'])->name('division.delete');
    
        Route::get('/district/view' , [ShippingAreaController::class , 'DistrictView'])->name('manage.district');
        Route::post('/district/store' , [ShippingAreaController::class , 'DistrictStore'])->name('district.store');
        Route::get('/district/edit/{id}' , [ShippingAreaController::class , 'DistrictEdit'])->name('district.edit');
        Route::post('/district/update' , [ShippingAreaController::class , 'DistrictUpdate'])->name('district.update');   
        Route::get('/district/delete/{id}' , [ShippingAreaController::class , 'DistrictDelete'])->name('district.delete');
        
        
        // Route::get('/state/view' , [ShippingAreaController::class , 'StateView'])->name('manage.state');
        // Route::post('/state/store' , [ShippingAreaController::class , 'StateStore'])->name('state.store');
        // Route::get('/state/edit/{id}' , [ShippingAreaController::class , 'StateEdit'])->name('state.edit');
        // Route::post('/state/update' , [ShippingAreaController::class , 'StateUpdate'])->name('state.update');   
        // Route::get('/state/delete/{id}' , [ShippingAreaController::class , 'StateDelete'])->name('state.delete');

        
        Route::get('/district/ajax/{division_id}' , [ShippingAreaController::class , 'GetDivision']);
        
        Route::get('/editstate/ajax/{division_id}' , [SubCategoryController::class , 'EditGetState']);
    
        //---
        Route::get('/state/ajax/{district_id}' , [ShippingAreaController::class , 'GetState']);

                
    });

    Route::prefix('orders')->group(function(){
        Route::get('/pandingOrder/view' , [OrderController::class , 'pandingOrderView'])->name('orders.pandingOrder');
        Route::get('/pandingOrder/detail/view/{id}' , [OrderController::class , 'pandingOrderDetailView'])->name('order.pending.detail');  
             
        Route::get('/confirmOrder/view' , [OrderController::class , 'confirmOrderView'])->name('orders.confirmOrder');
        Route::get('/processingOrder/view' , [OrderController::class , 'processingOrderView'])->name('orders.processingOrder');
        Route::get('/pickedOrder/view' , [OrderController::class , 'pickedOrderView'])->name('orders.pickedOrder');
        Route::get('/shippedOrder/view' , [OrderController::class , 'shippedOrderView'])->name('orders.shippedOrder');
        Route::get('/deliveredOrder/view' , [OrderController::class , 'deliveredOrderView'])->name('orders.deliveredOrder');
        Route::get('/cancelOrder/view' , [OrderController::class , 'cancelOrderView'])->name('orders.cancelOrder');
        Route::get('/return/view' , [OrderController::class , 'returnOrderView'])->name('orders.return');
        Route::get('/return/aprove/{id}' , [OrderController::class , 'returnOrderAprove'])->name('order.return.approve');
        Route::get('/return/aprove' , [OrderController::class , 'AprovedView'])->name('order.aprove.view');
        
        
        
        Route::get('/pending-comfirm/{id}' , [OrderController::class , 'PandingToComfirm'])->name('pending-comfirm');
        Route::get('/comfirm-process/{id}' , [OrderController::class , 'comfirmToprocess'])->name('comfirm-process');
        Route::get('/process-picked/{id}' , [OrderController::class ,  'processTopicked'])->name('process-picked');
        Route::get('/picked-shipped/{id}' , [OrderController::class ,  'pickedToshipped'])->name('picked-shipped');
        Route::get('/shipped-delivered/{id}' , [OrderController::class ,  'shippedTodelivered'])->name('shipped-delivered');
        Route::get('/delivered-cancel/{id}' , [OrderController::class ,  'deliveredTocancel'])->name('delivered-cancel');
        
        Route::get('/invoice-download/{id}' , [OrderController::class ,  'OrderInvoiceDownlod'])->name('order.invoice.download');                                            
    }); 

    Route::prefix('repots')->group(function(){
        Route::get('/all-repots/view' , [RepotsController::class , 'RepotsView'])->name('all.repots');  
        Route::post('/all-repots/serch/date' , [RepotsController::class , 'RepotsByDate'])->name('search-by-name');  
        Route::post('/all-repots/serch/month' , [RepotsController::class , 'RepotsByMonth'])->name('search-by-month');  
        Route::post('/all-repots/serch/year' , [RepotsController::class , 'RepotsByYear'])->name('search-by-year'); 
        
        Route::get('/all-repots/dashbord/date/{id}' , [RepotsController::class , 'RepotsDashByDate'])->name('dashbord-by-date');  
        Route::get('/all-repots/dashbord/month/{id}' , [RepotsController::class , 'RepotsDashByMonth'])->name('dashbord-by-month');  
        Route::get('/all-repots/dashbord/year/{id}' , [RepotsController::class , 'RepotsDashByYear'])->name('dashbord-by-year'); 
        


    });

    Route::prefix('users')->group(function(){
        Route::get('/all-user/view' , [RepotsController::class , 'AllUserView'])->name('all.user');         
    });

    Route::prefix('blogs')->group(function(){
        Route::get('/category/view' , [BlogController::class , 'BlogCategoryView'])->name('blog.category'); 
        Route::post('/category/store' , [BlogController::class , 'BlogCategoryStore'])->name('blog.category.store');
        Route::get('/category/edit/{id}' , [BlogController::class , 'BlogCategoryEdit'])->name('blog.category.edit');
        Route::post('/category/update' , [BlogController::class , 'BlogCategoryUpdate'])->name('blog.category.update');   
        Route::get('/category/delete/{id}' , [BlogController::class , 'BlogCategoryDelete'])->name('blog.category.delete');
        
        Route::get('/blog-post/view' , [BlogController::class , 'BlogPostStoreView'])->name('blog.post.view'); 
        Route::get('/blog-post/add' , [BlogController::class , 'BlogPostView'])->name('blog.post'); 
        Route::post('/blog-post/store' , [BlogController::class , 'BlogPostStore'])->name('blog.post.store');

        Route::get('/blog-post/edit/{id}' , [BlogController::class , 'BlogPostEdit'])->name('blogPost.edit');
        Route::post('/blog-post/update' , [BlogController::class , 'BlogPostUpdate'])->name('blogPost.update');   
        Route::get('/blog-post/delete/{id}' , [BlogController::class , 'BlogPostDelete'])->name('blogPost.delete');
        Route::get('/blog-post/comment/view/{id}' , [BlogController::class , 'BlogPostCommentView'])->name('blog.post.comment'); 
        Route::get('/comment/view/{id}/{b_id}' , [BlogController::class , 'CommentView'])->name('comment.view'); 
        Route::post('/comment/ReplyAdd' , [BlogController::class , 'ReplyAdd'])->name('reply.add');   
        Route::get('/comment/delete/{id}' , [BlogController::class , 'CommentDelete'])->name('comment.delete');
        
        
    });   
    
    Route::prefix('settings')->group(function(){
        Route::get('/site-setting' , [SiteSettingController::class , 'SettingUpdate'])->name('setting.manage');         
        Route::post('/setting/edit' , [SiteSettingController::class , 'SettingEdit'])->name('settings.store');  
        Route::get('/SEO' , [SiteSettingController::class , 'SettingSEO'])->name('setting.seo');     
        Route::post('/seo/edit' , [SiteSettingController::class , 'SEOEdit'])->name('seo.store');  

    });    
    
    Route::get('/view/review/{id}' , [RepotsController::class , 'reviewView'])->name('review.view');     
    Route::get('/review/approve/{id}' , [RepotsController::class , 'reviewApprove'])->name('review.approve');     
    Route::get('/review/delete/{id}' , [RepotsController::class , 'reviewDelete'])->name('review.delete');     
    
    Route::get('/admin/chart' , [AdminController::class , 'chatJS']);     

    
}); 

// end admin protect meddilwere  








// may change *********************************************************
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
// 	$id = Auth::user()->id;
//     $user = User::find($id);
//     return view('dashboard',compact('user'));
// })->name('dashboard');

// =================================================== Frontend All Route =============================================================








 //   pharmasy =================================================================
 Route::get('/' , [UserIndexController::class , 'Index']);

 
 
 // Product detail route
Route::get('/product/detail/{id}/{slug}' , [UserIndexController::class , 'ProductDetail'])->name('product.detail');

 

// Frontend product categorywise
Route::get('/product/categorywise/{id}/{slug}' , [UserIndexController::class , 'ProductCatwise']);
Route::get('/product/subcategorywise/{id}/{slug}' , [UserIndexController::class , 'ProductSubCatwise']);

// frontend brand all
Route::get('/brands/all/{id}/{slug}' , [UserIndexController::class , 'BrandAll']);


// user route for login , register , logout
Route::get('/user/login' , [UserIndexController::class , 'login'])->name('user.login');
Route::get('/user/registration' , [UserIndexController::class , 'registration'])->name('user.registration');

// product view modal with ajax
Route::get('/product/view/modal/{id}' , [UserIndexController::class , 'ProductViewAjax']);

//add to cart storre with ajax
Route::post('/cart/data/store/{id}' , [CartController::class , 'AddToCart']);

//get data from mini cart with ajax
Route::get('/product/mini/cart' , [CartController::class , 'AddMiniCart']);

// remove from mini cart with Ajax
Route::get('/minicart/product-remove/{rowId}' , [CartController::class , 'RemoveMiniCart']);

// add to wish list with ajax
Route::post('/add-to-wishlist/{product_id}' , [WhishListController::class , 'AddToWishList']);









//==================================================================================================

Route::group(['prefix' => 'user' , 'middleware' => ['user' , 'auth'] , 'namespace' => 'User'] ,
function(){

    
    // user route==============================================================================================

   
    Route::get('/logout' , [IndexController::class , 'UserLogout'])->name('user.logout');
    Route::get('/profile' , [IndexController::class , 'UserProfile'])->name('user.profile');
    Route::post('/profile/store' , [IndexController::class , 'UserProfileStore'])->name('user.profile.store');
    Route::get('/profile/changePassword' , [IndexController::class , 'UserProfileChangePassword'])->name('user.changePassword');
    Route::post('/profile/passwordUpdate' , [IndexController::class , 'UserPasswordUpdate'])->name('user.profile.change_password');


    // wish list page
    Route::get('/wishlist' , [WhishListController::class , 'ViewWishList'])->name('wishlist');

    //get data into wishlist with ajax
    Route::get('/product/wishList' , [WhishListController::class , 'AddWishList']);

    // remove from wishlist with Ajax
    Route::get('/wishlist/product-remove/{id}' , [WhishListController::class , 'RemoveWishList']);
        
    // check out with strim gatway
    Route::post('/stripe/order' , [StripeController::class , 'StripeOrder'])->name('stripe.order');  
    
        
    // check out with  cash on
    Route::post('/cash/order' , [CashController::class , 'CashOrder'])->name('cash.order');  
    

     //user my order
     Route::get('/profile/myOrder' , [AllUserController::class , 'MyOrders'])->name('myOrder');

     
    //user my order view
    Route::get('/profile/myOrder/view/{order_id}' , [AllUserController::class , 'MyOrderView'])->name('myDetailOrder');

     //user my order PDF download
     Route::get('/profile/myOrder/download/{order_id}' , [AllUserController::class , 'MyOrderDownload'])->name('myOrderDownload');

    
    Route::get('/district/ajax/{division_id}' , [ShippingAreaController::class , 'GetDivision']);
        
   
    Route::get('/state/ajax/{district_id}' , [ShippingAreaController::class , 'GetState']);

    // return order route
    Route::post('/profile/myOrder/return/{id}' , [AllUserController::class , 'ReturnMyOrder'])->name('order.return');
     
    Route::get('/profile/myOrder/return-view' , [AllUserController::class , 'ReturnMyOrderView'])->name('order.return.view');

    // blog comment
    Route::post('/blog/comment' , [ViewBlogController::class , 'PostComment'])->name('blog.comment');

    // Review Addd 
    Route::post('/review/store' , [ReviewController::class , 'ReviewStore'])->name('review.store');
    
     // Order Track
     Route::post('/order/track' , [AllUserController::class , 'OrderTrack'])->name('order.track');
    
    // contact
    Route::post('/contact/store' , [UserIndexController::class , 'contactStore'])->name('contact.store');

    
});  //user protected route

//==================================================================================================
  

 // My cart page
 Route::get('/myCart' , [MyCartController::class , 'MyCart'])->name('myCart');

 //get data into MyCart with ajax
 Route::get('/user/product/MyCart' , [MyCartController::class , 'GetCartProduct']);

 // remove from wishlist with Ajax
 Route::get('/user/MyCartRemove/product-remove/{id}' , [MyCartController::class , 'RemoveMyCart']);

 // increment quantity of my cart with ajax
 Route::get('/cart/increment/{id}' , [MyCartController::class , 'IncrementCart']);


 // decrement quantity of my cart with ajax
 Route::get('/cart/decrement/{id}' , [MyCartController::class , 'DecrementCart']);

 


// frontend copun options

Route::post('/coupon-apply' , [MyCartController::class , 'CouponApply']);   
Route::get('/coupon-calculation' , [MyCartController::class , 'couponCalculation']);   
Route::get('/coupon-remove' , [MyCartController::class , 'couponRemove']);   


// frontend check out route

Route::get('/checkOut' , [MyCartController::class , 'CheckOutCreate'])->name('checkOut');
Route::post('/checkOut/store' , [checkOutController::class , 'CheckOuteStore'])->name('checkOute.store');  


// frontend Blog All route=====================================================================

Route::get('/blog' , [ViewBlogController::class , 'BlogView'])->name('blogPage.view');  
Route::get('/blog/detail/{id}' , [ViewBlogController::class , 'BlogDetailView'])->name('blogPage.detail.view');
Route::get('/blog/category/{id}' , [ViewBlogController::class , 'BlogCategoryView'])->name('blogPage.category.view');

// Serch product route 

Route::post('/product/saerch' , [UserIndexController::class , 'ProductSearch'])->name('product.search');  
Route::post('/advance-saerch' , [UserIndexController::class , 'AdvanceProductSearch']);  

// filter
Route::get('/filter-subcategory/{cid}/{sid}' , [UserIndexController::class , 'subcatFilter'])->name('subcat.filter');  
Route::get('/filter-subsubcategory/{cid}/{sid}/{ssid}' , [UserIndexController::class , 'subsubcatFilter']);  

// contact
Route::get('/contact' , [UserIndexController::class , 'contactPage'])->name('contact.page');


