<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminLoginController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AdminLoginController::class,'index'])->name('admin.login');


Route::get('/login', function () {
    return view('login');
});

Route::get('/reset', function () {
    return view('resetpassword');
});
Route::get('/check-email', function () {
    return view('checkemail');
});
Route::get('/verification', function () {
    return view('verification');
});
Route::get('/new-password', function () {
    return view('createnewpassword');
});
use App\Http\Controllers\buyer\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('cart');
