<?php

// use App\Http\Controllers\Auth\RegisterController;
// use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Admin\AdminLoginController;
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin/login', [AdminLoginController::class,'index'])->name('admin.login');




// Route::get('/reset', function () {
//     return view('users.resetpassword');
// });

// Route::get('/check-email', function () {
//     return view('users.checkemail');
// });
// Route::get('/verification', function () {
//     return view('users.verification');
// });
// Route::get('/new-password', function () {
    //     return view('users.createnewpassword');
    // });

    // Route::get('/home', function () {
//     return view('users.buyer.home');
// });

// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);
// Route::get('/login', function () {
    //     return view('users.login');
    // })->name('login');
    

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


Route::get('/signin', [AuthController::class, 'showSignIn'])->name('signin');
Route::post('/signin', [AuthController::class, 'signIn'])->name('login');

Route::get('/signup', [AuthController::class, 'showSignUp'])->name('signup');
Route::post('/signup', [AuthController::class, 'signUp'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', function () {
    $user = Auth::user(); // Get the logged-in user

    $orders = DB::table('orders')
        ->where('user_id', $user->id)
        ->get()
        ->map(function ($order) {
            $order->orderItems = DB::table('order_items')
                ->where('order_id', $order->id)
                ->get();
            return $order;
        });

    return view('profile.edit', compact('orders'));
})->middleware('auth');
