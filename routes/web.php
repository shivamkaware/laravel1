<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\frontend\CategoryController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\BrandController;
use App\Http\Controllers\frontend\ColorController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend1\FrontController;

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

// Route::get('/', function () {
//     return view('admin.index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
//CATEGORY CONTROLLER
Route::get('/category/form',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/index',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

//PRODUCTS CONTROLLER
Route::get('/product/form',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/index',[ProductController::class,'index'])->name('product.index');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('/product/update/{id}',[ProductController::class,'delete'])->name('product.delete');

//Brand Controller
Route::get('/brand/form',[BrandController::class,'create'])->name('brand.create');
Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
Route::get('/brand/index',[BrandController::class,'index'])->name('brand.index');
Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
Route::get('/brand/update/{id}',[BrandController::class,'delete'])->name('brand.delete');

//Color Controller
Route::get('/color/form',[ColorController::class,'create'])->name('color.create');
Route::post('/color/store',[ColorController::class,'store'])->name('color.store');
Route::get('/color/index',[ColorController::class,'index'])->name('color.index');
Route::get('/color/edit/{id}',[ColorController::class,'edit'])->name('color.edit');
Route::post('/color/update/{id}',[ColorController::class,'update'])->name('color.update');
Route::get('/color/update/{id}',[ColorController::class,'delete'])->name('color.delete');

Route::get('/review',function(){
    return view('admin.review.index');
});

Route::get('/review',[BrandController::class,'review'])->name('review');
// Route::get('/review',[BrandController::class,'redit'])->name('review.edit');
Route::get('/order',[OrderController::class,'create'])->name('order.create');
Route::get('/order/index',[OrderController::class,'index'])->name('order.index');



//FrontEnd Controller

Route::get('/',[FrontController::class,'index'])->name('front.index');

Route::get('/test',[FrontController::class,'index'])->name('front.index');


//     return view('example');
// })->name('example')->returnedTo();
