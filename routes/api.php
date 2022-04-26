<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\api\customerOrdersController;
use App\Http\Controllers\Api\DepartmentsController;
use App\Http\Controllers\Api\PayPalPaymentController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/product-detail', [\App\Http\Controllers\ProductController::class, 'productDetail']);
Route::get('/main-page-slider', [\App\Http\Controllers\Api\SliderController::class, 'getMainPageSlider']);
//cart routes
Route::put('/add-to-cart', [\App\Http\Controllers\Api\cartController::class, 'add']);
Route::put('/remove-from-cart', [\App\Http\Controllers\Api\cartController::class, 'removeFromCart']);
Route::get('/complete-order', [\App\Http\Controllers\Api\cartController::class, 'orderComplete']);
Route::put('/update-shipping-method', [\App\Http\Controllers\Api\cartController::class, 'updateShippingMethod']);


//payment routes
Route::post('/create-charge', [\App\Http\Controllers\Api\paymentController::class, 'createCharge']);
Route::post('/update-cart-payment', [\App\Http\Controllers\Api\paymentController::class, 'updateCartPayment']);

Route::post('/paypal/payment/add-fund', [PayPalPaymentController::class, 'payWithpaypal']);
Route::get('/paypal/payment/status', [PayPalPaymentController::class, 'getPaymentStatus']);

//sign - sign up routes
Route::post('/user/sign-up', [AuthenticationController::class, 'signUp']);
Route::post('/user/sign-in', [AuthenticationController::class, 'logIn']);

// departments Controller
Route::get('/departments', [DepartmentsController::class, 'departments']);

// Customer Review
Route::get('/get-reviews', [\App\Http\Controllers\api\ReviewController::class, 'fetchReviews']);
Route::put('/submit-review', [\App\Http\Controllers\api\ReviewController::class, 'createReview']);


Route::group(['middleware' => 'auth:api'], function () {
// customer orders
    Route::get('/customer-orders', [customerOrdersController::class, 'customerOrders']);
// profile controller
    Route::post('user/update-profile', [ProfileController::class, 'updateProfile']);
});
