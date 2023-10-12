<?php

use App\Http\Controllers\PaypalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*-----Paypal------*/

Route::post('paypal/payment',[PaypalController::class,'payment'])->name('paypal');
Route::get('paypal/success',[PaypalController::class,'paypal_success'])->name('paypal_success');
Route::get('paypal/cancel',[PaypalController::class,'paypal_cancel'])->name('paypal_cancel');
