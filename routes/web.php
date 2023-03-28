<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;

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

// Show Shop Index page
Route::get('/', [ShopController::class, 'index']);

// Show User Login form
Route::get('/login', [UserController::class, 'login'])->name('login');

// Show User Register form
Route::get('/register', [UserController::class, 'register']);