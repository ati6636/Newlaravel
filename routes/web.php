<?php

use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderitemController;
use App\Http\Controllers\ShopcartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductsController;

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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/laravel', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
|
FrontEnd
Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/referances', [HomeController::class, 'referances'])->name('referances');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/sendmessage', [HomeController::class, 'sendmessage'])->name('sendmessage');
Route::get('/product/{id}/{slug}', [HomeController::class, 'product'])->name('product');
Route::get('/categoryproducts/{id}/{slug}', [HomeController::class, 'categoryproducts'])->name('categoryproducts');
Route::post('/getproduct', [HomeController::class, 'getproduct'])->name('getproduct');
Route::get('/productlist/{search}', [HomeController::class, 'productlist'])->name('productlist');
Route::get('logout', [AdminHomeController::class, 'logout'])->name('admin.logout');

Route::prefix('myaccount')->namespace('myaccount')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('myprofile');
    Route::get('/myreviews', [UserController::class, 'myreviews'])->name('myreviews');
    Route::get('/destroymyreview/{id}', [UserController::class, 'destroymyreview'])->name('user_review_delete');
});

Route::prefix('user')->namespace('userprofile')->middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('userprofile');

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductsController::class, 'index'])->name('user_products');
        Route::get('create', [ProductsController::class, 'create'])->name('user_product_create');
        Route::post('store', [ProductsController::class, 'store'])->name('user_product_store');
        Route::get('edit/{id}', [ProductsController::class, 'edit'])->name('user_product_edit');
        Route::post('update/{id}', [ProductsController::class, 'update'])->name('user_product_update');
        Route::get('delete/{id}', [ProductsController::class, 'destroy'])->name('user_product_delete');
        Route::get('show', [ProductsController::class, 'show'])->name('user_product_show');
    });

    Route::prefix('image')->group(function () {
        Route::get('create/{id}', [ImagesController::class, 'create'])->name('user_image_create');
        Route::post('store/{id}', [ImagesController::class, 'store'])->name('user_image_store');
        Route::get('delete/{id}/{product_id}', [ImagesController::class, 'destroy'])->name('user_image_delete');
        Route::get('show', [ImagesController::class, 'show'])->name('user_image_show');
    });

    Route::prefix('shopcart')->group(function () {
        Route::get('/', [ShopcartController::class, 'index'])->name('user_shopcart');
        Route::post('store/{id}', [ShopcartController::class, 'store'])->name('user_shopcart_store');
        Route::post('update/{id}', [ShopcartController::class, 'update'])->name('user_shopcart_update');
        Route::get('delete/{id}', [ShopcartController::class, 'destroy'])->name('user_shopcart_delete');
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('user_order');
        Route::post('create', [OrderController::class, 'create'])->name('user_order_create');
        Route::post('store', [OrderController::class, 'store'])->name('user_order_store');
        Route::get('edit/{id}', [OrderController::class, 'edit'])->name('user_order_edit');
        Route::post('update/{id}', [OrderController::class, 'update'])->name('user_order_update');
        Route::get('delete/{id}', [OrderController::class, 'destroy'])->name('user_order_delete');
        Route::get('show/{id}', [OrderController::class, 'show'])->name('user_order_show');
    });

});

/*
|--------------------------------------------------------------------------
|
BackEnd
Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('login', [AdminHomeController::class, 'login'])->name('admin.login');
    Route::post('login', [AdminHomeController::class, 'loginPost'])->name('admin.login.post');
    Route::get('logout', [AdminHomeController::class, 'logout'])->name('admin.logout');


    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin_category');
        Route::get('add', [CategoryController::class, 'add'])->name('admin_category_add');
        Route::post('create', [CategoryController::class, 'create'])->name('admin_category_create');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin_category_edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('admin_category_update');
        Route::get('delete/{id}', [CategoryController::class, 'destroy'])->name('admin_category_delete');
        Route::get('show', [CategoryController::class, 'show'])->name('admin_category_show');
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin_products');
        Route::get('create', [ProductController::class, 'create'])->name('admin_product_create');
        Route::post('store', [ProductController::class, 'store'])->name('admin_product_store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin_product_edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('admin_product_update');
        Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('admin_product_delete');
        Route::get('show', [ProductController::class, 'show'])->name('admin_product_show');
    });

    Route::prefix('message')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('admin_message');
        Route::get('edit/{id?}', [MessageController::class, 'edit'])->name('admin_message_edit');
        Route::post('update/{id}', [MessageController::class, 'update'])->name('admin_message_update');
        Route::get('delete/{id}', [MessageController::class, 'destroy'])->name('admin_message_delete');
        Route::get('show', [MessageController::class, 'show'])->name('admin_message_show');
    });

    Route::prefix('image')->group(function () {
        Route::get('create/{id}', [ImageController::class, 'create'])->name('admin_image_create');
        Route::post('store/{id}', [ImageController::class, 'store'])->name('admin_image_store');
        Route::get('delete/{id}/{product_id}', [ImageController::class, 'destroy'])->name('admin_image_delete');
        Route::get('show', [ImageController::class, 'show'])->name('admin_image_show');
    });

    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin_settings');
        Route::post('update/{id}', [SettingController::class, 'update'])->name('admin_setting_update');
    });

    Route::prefix('review')->group(function () {
        Route::get('/', [ReviewController::class, 'index'])->name('admin_review');
        Route::post('update/{id}', [ReviewController::class, 'update'])->name('admin_review_update');
        Route::get('delete/{id}', [ReviewController::class, 'destroy'])->name('admin_review_delete');
        Route::get('show/{id}', [ReviewController::class, 'show'])->name('admin_review_show');
    });

    Route::prefix('faq')->group(function () {
        Route::get('/', [FaqController::class, 'index'])->name('admin_faq');
        Route::get('create', [FaqController::class, 'create'])->name('admin_faq_create');
        Route::post('store', [FaqController::class, 'store'])->name('admin_faq_store');
        Route::get('edit/{id}', [FaqController::class, 'edit'])->name('admin_faq_edit');
        Route::post('update/{id}', [FaqController::class, 'update'])->name('admin_faq_update');
        Route::get('delete/{id}', [FaqController::class, 'destroy'])->name('admin_faq_delete');
        Route::get('show', [FaqController::class, 'show'])->name('admin_faq_show');
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('admin_orders');
        Route::get('list/{status}', [AdminOrderController::class, 'list'])->name('admin_order_list');
        Route::post('create', [AdminOrderController::class, 'create'])->name('admin_order_create');
        Route::post('store', [AdminOrderController::class, 'store'])->name('admin_order_store');
        Route::get('edit/{id}', [AdminOrderController::class, 'edit'])->name('admin_order_edit');
        Route::post('update/{id}', [AdminOrderController::class, 'update'])->name('admin_order_update');
        Route::post('itemupdate/{id}', [AdminOrderController::class, 'itemupdate'])->name('admin_order_item_update');
        Route::get('delete/{id}', [AdminOrderController::class, 'destroy'])->name('admin_order_delete');
        Route::get('show/{id}', [AdminOrderController::class, 'show'])->name('admin_order_show');
    });


});
