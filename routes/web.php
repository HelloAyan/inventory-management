<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::controller(DashboardController::class)->group(function (){
        Route::get('admin/dashboard', 'index')->name('admindashboard');
    }); 

    Route::controller(CategoryController::class)->group(function (){
        Route::get('admin/all-category', 'index')->name('allcategory');
        Route::get('admin/add-category', 'AddCategory')->name('addcategory');
    }); 

    Route::controller(SubCategoryController::class)->group(function (){
        Route::get('admin/all-subcategory', 'index')->name('allsubcategory');
        Route::get('admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
    }); 

    Route::controller(ProductController::class)->group(function (){
        Route::get('admin/all-product', 'index')->name('allproduct');
        Route::get('admin/add-product', 'AddProduct')->name('addproduct');
    }); 

    Route::controller(OrderController::class)->group(function (){
        Route::get('admin/order', 'index')->name('allorder');
    }); 

    

});

require __DIR__.'/auth.php';