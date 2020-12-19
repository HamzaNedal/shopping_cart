<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products',[ProductController::class,'index'])->name('products')->middleware('auth');;
Route::get('/addToCart/{product}',[CartController::class,'addToCart'])->name('add_to_cart')->middleware('auth');
Route::get('/cart/show_cart',[CartController::class,'index'])->name('show_cart')->middleware('auth');
Route::get('/cart/checkout',[CartController::class,'checkout'])->name('cart.checkout')->middleware('auth');
Route::post('/charge',[CartController::class,'charge'])->name('cart.charge')->middleware('auth');
Route::get('/orders',[OrderController::class,'index'])->name('orders.show')->middleware('auth');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
