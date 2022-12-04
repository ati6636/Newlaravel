<?php

use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

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
Route::get('/addtocart/{id}', [HomeController::class, 'addtocart'])->name('addtocart');
Route::post('/getproduct', [HomeController::class, 'getproduct'])->name('getproduct');
Route::get('/productlist/{search}', [HomeController::class, 'productlist'])->name('productlist');

Route::prefix('myaccount')->namespace('myaccount')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('myprofile');
});

Route::prefix('user')->namespace('userprofile')->middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('userprofile');
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
});
