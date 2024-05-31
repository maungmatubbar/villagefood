<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Frontend\CustomerDashboardController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\OrderController;

// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/product-details/{id}', [ShopController::class, 'productDetails'])->name('product.details');
Route::get('/category/{categoryId}/products', [ShopController::class, 'categoryProducts'])->name('category.products');
//Cart
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart-qty-update', [CartController::class, 'updateQty'])->name('cart.update.qty');
Route::post('/cart-remove-item', [CartController::class, 'removeItem'])->name('cart.remove.item');
//Language switch
Route::get('/lang-switch/{lang}', [LanguageController::class, 'langSwitch'])->name('lang.switch');

//Customer
Route::get('/login-customer',[CustomerController::class,'login'])->name('customer.login');
Route::post('/store-login',[CustomerController::class,'storeLogin'])->name('customer.login.store');
Route::post('/customer-logout',[CustomerController::class,'logout'])->name('customer.logout');
Route::get('/create-account',[CustomerController::class,'register'])->name('customer.register');
Route::post('/store-account',[CustomerController::class,'storeAccount'])->name('customer.register.store');

//Orders

Route::middleware('customer')->group(function (){
    Route::get('/checkout',[OrderController::class,'checkout'])->name('customer.checkout');
    Route::post('/order-place',[OrderController::class,'placeOrder'])->name('place.order');
    Route::get('/order-complete/{invoiceNo}',[OrderController::class,'orderComplete'])->name('order.complete');
    //
    Route::get('/customer-dashboard',[CustomerDashboardController::class,'dashboard'])->name('customer.dashboard');

});


//Admin
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/backend.php';
require __DIR__.'/seller.php';
