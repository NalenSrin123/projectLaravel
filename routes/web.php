<?php

use App\Http\Controllers\Backend\categoryController;
use App\Http\Controllers\Backend\logo;
use App\Http\Controllers\Backend\logoController;
use App\Http\Controllers\Backend\newsController;
use App\Http\Controllers\Backend\productController;
use App\Http\Controllers\Backend\userController;
use App\Http\Controllers\frontend\homeController;
use App\Http\Controllers\frontend\newsController as FrontendNewsController;
use App\Http\Controllers\frontend\productController as FrontendProductController;
use App\Http\Controllers\frontend\shopController;
use Illuminate\Support\Facades\Route;

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




//auth


Route::controller(userController::class)->group(function(){
    Route::get('/signup','Register')->name('signup');
    Route::post('/signup-submit','RegisterSubmit')->name('signup-submit');
    Route::get('/signin','SignIn')->name('login');
    Route::post('/signin-submit','SignInSubmit')->name('signin-submit');
    Route::get('/admin/logout','Logout')->name('admin-logout');
    Route::get('/edit-profile/{user}','editProfile')->name('edit-profile');
    Route::post('/edit-profile-submit/{user}','editProfileSubmit')->name('edit-profile-submit');

});
Route::middleware(['auth'])->group(function(){
    Route::get('/admin',function(){
        return view('Backend.master');
    });
    Route::controller(logoController::class)->group(function(){
        Route::get('/list-logo','listLogo')->name('list-logo');
        Route::get('/add-logo','addLogo')->name('add-logo');
        Route::post('/add-logo-submit','addLogoSubmit')->name('add-logo-submit');
        Route::get('/edit-logo/{logo}','editLogo')->name('edit-logo');
        Route::post('/edit-logo-submit/{logo}','editLogoSubmit')->name('edit-logo-submit');
        Route::post('/delete-logo','deleteLogo')->name('delete-logo');

    });
    Route::controller(productController::class)->group(function(){
        Route::get('/list-product','listProduct')->name('list-product');
        Route::get('/add-product','addProduct')->name('add-product');
        Route::post('/add-product-submit','addProductSubmit')->name('add-product-submit');
        Route::get('/edit-product/{product}','editProduct')->name('edit-product');
        Route::post('/edit-product-submit/{product}','editProductSubmit')->name('edit-product-submit');
        Route::post('/delete-product','deleteProduct')->name('delete-product');

    });
    Route::controller(categoryController::class)->group(function(){
        Route::get('/list-category','listCategory')->name('list-category');
        Route::get('/add-category','addCategory')->name('add-category');
        Route::post('/add-category-submit','addCategorySubmit')->name('add-category-submit');
        Route::get('/edit-category/{category}','editCategory')->name('edit-category');
        Route::post('/edit-category-submit/{category}','editCategorySubmit')->name('edit-category-submit');
        Route::post('/delete-category','deleteCategory')->name('delete-category');
    });



});
Route::controller(newsController::class)->group(function(){
    Route::get('/list-news','listNews')->name('list-news');
    Route::get('/add-news','addNews')->name('add-news');
    Route::post('/add-news-submit','addNewsSubmit')->name('add-news-submit');
    Route::get('/edit-news/{news}','editNews')->name('edit-news');
    Route::post('/edit-news-submit/{news}','editNewsSubmit')->name('edit-news-submit');
    Route::post('/delete-news','deleteNews')->name('delete-news');


});
Route::controller(FrontendProductController::class)->group(function(){


    Route::get('/product/{product}','product')->name('product');
    Route::get('/buy-product/{product}','buyProduct')->name('buy-product');
    Route::post('/buy-product-submit/{product}','buyProductSubmit')->name('buy-product-submit');

    Route::get('/search-product','searchProduct')->name('search-product');
});
Route::controller(FrontendNewsController::class)->group(function(){
    Route::get('/get-news','getAllNews')->name('get-news');
    Route::get('/news-detail/{news}','newDetail')->name('news-detail');
});
Route::controller(shopController::class)->group(function(){
    Route::get('/shop','getShop')->name('shop');
    Route::get('/get-by-man','getByMan')->name('get-by-man');
    Route::get('/get-by-woman','getByWoman')->name('get-by-woman');
    Route::get('/get-by-boy','getByBoy')->name('get-by-boy');
    Route::get('/get-by-girl','getByGirl')->name('get-by-girl');
    Route::get('/get-by-high-price','getByHighPrice')->name('get-by-high-price');
    Route::get('/get-by-low-price','getByLowPrice')->name('get-by-low-price');
    Route::get('/promotion-product','promotionProduct')->name('promotion-product');
});
Route::controller(homeController::class)->group(function(){
    Route::get('/','getAllPro')->name('getall');
});
Route::get('/news',function(){
    return view('frontend.news');
});

