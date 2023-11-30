<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\MpesaSTKPUSHController;
use App\Http\Controllers\MPESAC2BController;
use App\Http\Controllers\MPESAB2CController;
use App\Http\Controllers\PayPalPaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
--------------------------------------------------------------------------
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MpesaController::class, 'index']);
Route::get('/mpesa', [MpesaController::class, 'index'])->name('home');
#STK Push
Route::get('/mpesa/stkpush', [MpesaSTKPUSHController::class, 'index'])->name('stkpush');

Route::post('/v1/mpesatest/stk/push', [MpesaSTKPUSHController::class, 'STKPush'])->name('mpesa.stkpush');
// Mpesa STK Push Callback Route
Route::post('v1/confirm', [MpesaSTKPUSHController::class, 'STKConfirm'])->name('mpesa.confirm');

#C2B
Route::post('register-urls', [MPESAC2BController::class, 'registerURLS']);
Route::post('c2b/simulate', [MPESAC2BController::class, 'simulate']);

#B2C
Route::post('/v1/b2c/simulate', [MPESAB2CController::class, 'simulate'])->name('b2c.simulate');

// MPESA B2C
Route::post('v1/b2c/result', [MPESAB2CController::class, 'result'])->name('b2c.result');
Route::post('v1/b2c/timeout', [MPESAB2CController::class, 'timeout'])->name('b2c.timeout');

//PAYPAL
Route::get('paypal/index', [PayPalPaymentController::class, 'index'])->name('paypal.index');
Route::post('handle-payment', [PayPalPaymentController::class, 'handlePayment'])->name('make.payment');
Route::get('cancel-payment', [PayPalPaymentController::class, 'paymentCancel'])->name('payment.cancel');
Route::get('payment-success', [PayPalPaymentController::class, 'paymentSuccess'])->name('payment.success');


