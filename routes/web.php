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

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productShow']);

Route::middleware(['auth'])->group(function (){
    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
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
        'discounts' => 'App\Http\Controllers\Admin\DiscountController'
    ]);
});
