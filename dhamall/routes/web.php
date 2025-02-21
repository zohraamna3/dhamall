<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminLoginController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AdminLoginController::class,'index'])->name('admin.login');


