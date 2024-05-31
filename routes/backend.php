<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserContoller;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\InvoiceController;
Route::middleware(['auth','verified','admin'])->group(function (){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    //Categories
    Route::prefix('/category')->controller(CategoryController::class)->group(function (){
        Route::get('/list', 'index')->name('backend.category.index');
        Route::get('/create','create')->name('backend.category.create');
        Route::post('/store', 'store')->name('backend.category.store');
        Route::get('/edit/{id}', 'edit')->name('backend.category.edit');
        Route::post('/update/{id}','update')->name('backend.category.update');
        Route::get('/delete/{id}', 'destroy')->name('backend.category.delete');
        Route::get('/update-status/{id}', 'updateStatus')->name('backend.category.update.status');
    });
    //Products
    Route::prefix('/product')->controller(ProductController::class)->group(function (){
        Route::get('/list', 'index')->name('product.index');
        Route::get('/create','create')->name('product.create');
        Route::post('/store', 'store')->name('product.store');
        Route::get('/edit/{id}', 'edit')->name('product.edit');
        Route::post('/update/{id}','update')->name('product.update');
        Route::get('/delete/{id}', 'destroy')->name('product.delete');
        Route::get('/publish/{id}', 'published')->name('product.published');
        Route::get('/approve/{id}', 'approved')->name('product.approved');
//        Route::get('/update-status/{id}', 'updateStatus')->name('backend.category.update.status');
    });
    //Products
    Route::prefix('/user')->controller(UserContoller::class)->group(function (){
        Route::get('/list', 'index')->name('user.index');
        Route::get('/approved/{id}', 'approved')->name('backend.user.approved');
    });
    // Order list
    Route::prefix('/order')->group(function (){
        Route::get('/list', [OrderController::class,'index'])->name('order.list');
    });
    Route::prefix('/invoice')->group(function (){
        Route::get('/list', [InvoiceController::class,'index'])->name('invoice.list');
    });


});

