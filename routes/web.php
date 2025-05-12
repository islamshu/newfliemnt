<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('product/{slug}',[HomeController::class,'single_product'])->name('single_product');
Route::get('/csrab', [HomeController::class,'csrab']);
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category.slug');

Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::get('page/{page}', [HomeController::class, 'page'])->name('page');
Route::post('send_data', [CartController::class, 'send_data'])->name('send_data');
Route::get('pay', [CartController::class, 'pay'])->name('pay');
Route::get('checkout-tamara', [PaymentController::class, 'tamara'])->name('checkout.tamara');
Route::get('checkout-tappy', [PaymentController::class, 'tappy'])->name('checkout.tappy');
Route::post('send_pay', [PaymentController::class, 'processPayment'])->name('send_pay');
Route::get('payment-confirm', [PaymentController::class, 'payment_confirm'])->name('payment.confirm');
Route::post('payment-confirm', [PaymentController::class, 'payment_confirm_post'])->name('payment_post.confirm');
Route::post('checkout-tappy', [PaymentController::class, 'payment_tappy'])->name('process.tappy');
Route::post('checkout-tamara', [PaymentController::class, 'payment_tamara'])->name('process.tamara');
Route::get('/invoice/{order}', [InvoiceController::class, 'show'])->name('invoice.show');
Route::get('/contact/{order}', [InvoiceController::class, 'contact'])->name('invoice.contact');
Route::get('checkout-knet', [PaymentController::class, 'knet'])->name('checkout.knet');
Route::post('process-knet', [PaymentController::class, 'payment_knet_post'])->name('process.knet');
Route::get('confirm-knet', [PaymentController::class, 'knet_confirm'])->name('knet.confirm');
Route::post('confirm_knet', [PaymentController::class, 'knet_confirm_post'])->name('otp.submit');
Route::get('checkenv', [HomeController::class, 'checkenv']);






