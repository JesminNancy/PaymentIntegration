<?php

use App\Http\Controllers\PaypalController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*-----Paypal------*/

Route::post('paypal/payment',[PaypalController::class,'payment'])->name('paypal');
Route::get('paypal/success',[PaypalController::class,'paypal_success'])->name('paypal_success');
Route::get('paypal/cancel',[PaypalController::class,'paypal_cancel'])->name('paypal_cancel');

/*-----Stripe------*/

Route::post('stripe/payment',[StripeController::class,'payment'])->name('stripe');
Route::get('stripe/success',[StripeController::class,'stripe_success'])->name('stripe_success');
Route::get('<stripe>cancel',[StripeController::class,'stripe_cancel'])->name('stripe_cancel');
