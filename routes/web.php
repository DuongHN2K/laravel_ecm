<?php

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

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productShow');
    Route::get('thank-you', 'thankYou');
    Route::get('new-arrivals', 'newArrivals');
    Route::get('trendings', 'trendings');
    Route::get('search', 'searchProducts');
});

Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);

Route::middleware(['auth'])->group(function (){
    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);
    Route::put('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'cancelOrder']);
    Route::get('profile', [App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('profile', [App\Http\Controllers\Frontend\UserController::class, 'updateUserDetails']);
    Route::get('change-password', [App\Http\Controllers\Frontend\UserController::class, 'editPassword']);
    Route::post('change-password', [App\Http\Controllers\Frontend\UserController::class, 'updatePassword']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::resources([
        'categories' => 'App\Http\Controllers\Admin\CategoryController',
        'brands' => 'App\Http\Controllers\Admin\BrandController',
        'products' => 'App\Http\Controllers\Admin\ProductController',
        'users' => 'App\Http\Controllers\Admin\UserController',
        'discounts' => 'App\Http\Controllers\Admin\DiscountController',
        'orders' => 'App\Http\Controllers\Admin\OrderController'
    ]);
});
