<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ItemController;

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

Route::get('/', [ItemController::class, 'index'])->name('home');
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show');

//search route
Route::get('/search', [ItemController::class, 'search'])->name('search');

//add to cart route
Route::post('/items/add-to-cart', [ItemController::class, 'addToCart'])->name('add_to_cart');

//cart list route
Route::get('/cart', [ItemController::class, 'cartList'])->name('cart');
Route::post('/ajax', [ItemController::class, 'ajax'])->name('ajax');
Route::get('/order', [ItemController::class, 'order'])->name('order');
Route::post('/order', [ItemController::class, 'storeOrder']);
Route::get('/myOrders', [ItemController::class, 'myOrders'])->name("myOrders");

//login routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
//logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');






