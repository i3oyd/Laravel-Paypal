<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaypalPaymentController;

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


Route::get('/',[ProductController::class, 'index']);

Route::get('/login', [UserController::class,'login'])->middleware('guest');
Route::get('/register', [UserController::class,'create'])->middleware('guest');
Route::get('/logout', [UserController::class,'logout'])->middleware('auth');

Route::post('/users', [UserController::class, 'store']);//create new user
Route::post('/users/authenticate',[UserController::class,'authenticate']);

Route::get('/products/{product}',[ProductController::class, 'show']);
Route::get('/products',[ProductController::class, 'index']);

Route::get('/product/create', [ProductController::class, 'create'])->middleware('auth');
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

//Route::get('/paypal/get-access-token', [PaypalPaymentController::class,'getPaypalToken']);

Route::post('/pay', [PaypalPaymentController::class, 'pay']);
Route::get('/success', [PaypalPaymentController::class, 'success']);
Route::get('/error', [PaypalPaymentController::class, 'error']);

