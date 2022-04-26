<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PayPalPaymentController;
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

//To be placed below after.
//->where('any','.*')
Route::get('/{any}', [PagesController::class, 'index'])->where('any','.*');

Route::post('/payment/add-funds/paypal', [PayPalPaymentController::class, 'payWithpaypal']);
Route::get('payment/status/paypal', [PayPalPaymentController::class, 'getPaymentStatus'])->name('paypal-payment-status');
