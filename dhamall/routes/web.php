<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminLoginController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AdminLoginController::class,'index'])->name('admin.login');


Route::get('/login', function () {
    return view('users.login');
});

Route::get('/reset', function () {
    return view('users.resetpassword');
});
Route::get('/check-email', function () {
    return view('users.checkemail');
});
Route::get('/verification', function () {
    return view('users.verification');
});
Route::get('/new-password', function () {
    return view('users.createnewpassword');
});