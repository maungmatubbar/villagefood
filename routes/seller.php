<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\DashboardController;
use App\Http\Controllers\Seller\LoginController;
use App\Http\Controllers\Seller\ProductController;

Route::prefix('seller')->group(function (){

    Route::get('/login',[LoginController::class,'login'])->name('seller.login');
    Route::post('/login/store',[LoginController::class,'loginStore'])->name('seller.login.store');
    Route::get('/register',[LoginController::class,'register'])->name('seller.register');
    Route::post('/register/create',[LoginController::class,'storeRegister'])->name('seller.register.store');

    //Route::post('/login/create',[LoginController::class,'storeLogin'])->name('seller.login.store');
    Route::middleware(['seller'])->group(function (){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('seller.dashboard');
        Route::prefix('/product')->controller(ProductController::class)->group(function (){
            Route::get('/list', 'index')->name('seller.product.index');
           Route::middleware('approved_seller')->group(function (){
               Route::get('/create','create')->name('seller.product.create');
               Route::post('/store', 'store')->name('seller.product.store');
               Route::get('/edit/{id}', 'edit')->name('seller.product.edit');
               Route::post('/update/{id}','update')->name('seller.product.update');
               Route::get('/delete/{id}', 'destroy')->name('seller.product.delete');
               Route::get('/publish/{id}', 'published')->name('seller.product.published');
           });
        });
        //Products
    });
});
