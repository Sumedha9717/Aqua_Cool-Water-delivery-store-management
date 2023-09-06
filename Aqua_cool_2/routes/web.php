<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

// --------------------------------------------------------Home Path Route---------------------------------------------------------------

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);


// --------------------------------------------------------Contact_Us Route---------------------------------------------------------------
Route::get('/contact_us', [App\Http\Controllers\Frontend\ContactController::class, 'index']);
Route::post('/contact_us',[App\Http\Controllers\Frontend\ContactController::class,'sendMail'])->name('contact.send');


// --------------------------------------------------------ProductView Route---------------------------------------------------------------
Route::get('/collections/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView']);


// --------------------------------------------------------Cart Route---------------------------------------------------------------
Route::middleware(['auth'])->group(function () {

    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);

    Route::get('orders',[App\Http\Controllers\Frontend\OrderController::class,'index']);
    Route::get('orders/{orderId}',[App\Http\Controllers\Frontend\OrderController::class,'show']);

    Route::get('profile',[App\Http\Controllers\Frontend\UserController::class,'index']);
    Route::post('profile',[App\Http\Controllers\Frontend\UserController::class,'updateUserDetails']);

    Route::get('change-password',[App\Http\Controllers\Frontend\UserController::class,'passwordCreate']);
    Route::post('change-password',[App\Http\Controllers\Frontend\UserController::class,'ChangePassword']);

});


Route::get('thank-you',[App\Http\Controllers\Frontend\FrontendController::class,'thankyou']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//  // --------------------------------------------------------User Oders Routes---------------------------------------------------------------


// --------------------------------------------------------Admin Dashboard Routes---------------------------------------------------------------

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

// --------------------------------------------------------Dashboard Routes---------------------------------------------------------------
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

// --------------------------------------------------------Setting Routes---------------------------------------------------------------
    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index']);

// --------------------------------------------------------Home Sliders Routes---------------------------------------------------------------
     Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/sliders', 'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders/create', 'store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('/sliders/{slider}', 'update');
        Route::get('/sliders/{slider}/delete', 'destroy');
    });


    // --------------------------------------------------------Category Routes---------------------------------------------------------------

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category{category}', 'update');
    });


    // --------------------------------------------------------Brands Routes---------------------------------------------------------------

    Route::controller(App\Http\Controllers\Admin\brandController::class)->group(function () {
        Route::get('/brands', 'index');
        Route::get('/brands/create', 'create');
        Route::post('/brands', 'store');
        Route::get('/brands/{brand}/edit', 'edit');
        Route::put('/brands{brand}', 'update');
    });


     // --------------------------------------------------------Products Routes---------------------------------------------------------------

     Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/products/{product_id}/delete','destroy');
        Route::get('product-image/{product_image_id}/delete','destroyImage');
    });

     // --------------------------------------------------------Supplier Routes---------------------------------------------------------------

     Route::controller(App\Http\Controllers\Admin\SuplierController::class)->group(function () {
        Route::get('/supplier', 'index');
        Route::get('/supplier/create', 'create');
        Route::post('/supplier', 'store');
        Route::get('/supplier/{supplier}/edit', 'edit');
        Route::put('/supplier/{supplier}', 'update');
    });


     // --------------------------------------------------------Branch Routes---------------------------------------------------------------

     Route::controller(App\Http\Controllers\Admin\BranchController::class)->group(function () {
        Route::get('/branch', 'index');
        Route::get('/branch/create', 'create');
        Route::post('/branch', 'store');
        Route::get('/branch/{branch}/edit', 'edit');
        Route::put('/branch/{branch}', 'update');
    });

     // --------------------------------------------------------Oders Routes---------------------------------------------------------------

     Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');

        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');
        Route::get('/invoice/{orderId}/mail', 'mailInvoice');

    });


     // --------------------------------------------------------User Routes---------------------------------------------------------------

     Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create','create');

        Route::post('/users', 'store');
        Route::get('/users/{user_id}/edit','edit');

        Route::put('/users/{user_id}', 'update');
        Route::get('/users/{user_id}/delete', 'destroy');

    });

});



// --------------------------------------------------------User Dashboard Routes---------------------------------------------------------------

Route::prefix('user')->middleware(['auth','isUser'])->group(function(){

      // --------------------------------------------------------Dashboard Routes---------------------------------------------------------------
      Route::get('dashboard',[App\Http\Controllers\User\DashboardController::class,'index']);

     // --------------------------------------------------------Category Routes---------------------------------------------------------------
      Route::controller(App\Http\Controllers\User\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
    });

     // --------------------------------------------------------Category Routes---------------------------------------------------------------
     Route::controller(App\Http\Controllers\User\brandController::class)->group(function () {
        Route::get('/brands', 'index');
    });

     // --------------------------------------------------------Supplier Routes---------------------------------------------------------------

     Route::controller(App\Http\Controllers\User\SuplierController::class)->group(function () {
        Route::get('/supplier', 'index');
    });

     // --------------------------------------------------------Branch Routes---------------------------------------------------------------

     Route::controller(App\Http\Controllers\User\BranchController::class)->group(function () {
        Route::get('/branch', 'index');
    });



});
