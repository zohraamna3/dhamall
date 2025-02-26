<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Authentication Routes
Route::get('/signin', [AuthController::class, 'showSignIn'])->name('signin');
Route::post('/signin', [AuthController::class, 'signIn'])->name('login');

Route::get('/signup', [AuthController::class, 'showSignUp'])->name('signup');
Route::post('/signup', [AuthController::class, 'signUp'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Home Route (Earbuds E-commerce Homepage)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profile Route
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

    $paymentDetails = DB::table('user_payment_details')->where('user_id', $user->id)->first();
    $wishlist = DB::table('wishlist')->where('user_id', $user->id)->get();
    $shoppingCart = DB::table('shopping_cart')->where('user_id', $user->id)->get();

    return view('profile.edit', compact('orders', 'wishlist', 'shoppingCart', 'paymentDetails'));
})->middleware('auth');

// Payment Update Route
Route::post('/profile/payment/update', function (Illuminate\Http\Request $request) {
    $user = Auth::user(); 

    $validated = $request->validate([
        'payment_type'   => 'required|string',
        'account_number' => 'nullable|string|max:20',
        'expiry_date'    => 'nullable|date',
        'paypal_email'   => 'nullable|email',
        'bank_name'      => 'nullable|string|max:100',
        'is_default'     => 'nullable|boolean',
    ]);

    $existingPayment = DB::table('user_payment_details')->where('user_id', $user->id)->first();

    if ($existingPayment) {
        DB::table('user_payment_details')
            ->where('user_id', $user->id)
            ->update([
                'payment_type'   => $validated['payment_type'],
                'account_number' => $validated['account_number'] ?? null,
                'expiry_date'    => $validated['expiry_date'] ?? null,
                'paypal_email'   => $validated['paypal_email'] ?? null,
                'bank_name'      => $validated['bank_name'] ?? null,
                'is_default'     => $request->has('is_default') ? 1 : 0,
                'updated_at'     => now(),
            ]);
    } else {
        DB::table('user_payment_details')->insert([
            'user_id'        => $user->id,
            'payment_type'   => $validated['payment_type'],
            'account_number' => $validated['account_number'] ?? null,
            'expiry_date'    => $validated['expiry_date'] ?? null,
            'paypal_email'   => $validated['paypal_email'] ?? null,
            'bank_name'      => $validated['bank_name'] ?? null,
            'is_default'     => $request->has('is_default') ? 1 : 0,
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
    }

    return redirect('/profile')->with('success', 'Payment details updated successfully.');
})->middleware('auth')->name('payment.update');
