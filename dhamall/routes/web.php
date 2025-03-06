<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SellerController;
use  App\Http\Controllers\Admin\AdminDashboardController;
use  App\Http\Controllers\Admin\AdminLoginController;
use  App\Http\Controllers\CategoryController;
use  App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthenticatedSessionController;

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

    return view('users.buyer.profile.profile-page', compact('orders', 'wishlist', 'shoppingCart', 'paymentDetails'));
})->middleware('auth')->name('profile.edit');

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



Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');


Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::post('/checkout/update', [CheckoutController::class, 'update'])->name('checkout.update');
});

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::prefix('seller')->group(function () {
    Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
    Route::get('/products', [SellerController::class, 'products'])->name('seller.products');
    Route::get('/profile', [SellerController::class, 'profile'])->name('seller.profile');
    Route::post('/profile/update', [SellerController::class, 'updateProfile'])->name('seller.updateProfile');
    Route::get('/orders', [SellerController::class, 'orders'])->name('seller.orders'); // Ensure this exists
    Route::get('/reviews', [SellerController::class, 'reviews'])->name('seller.reviews');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::post('/profile/update', [SellerController::class, 'updateProfile'])->name('seller.profile.update');
    Route::get('/seller/products', [SellerController::class, 'productListings'])->name('seller.product_listings');
    Route::get('/product/{id}/reviews', [reviewController::class, 'showReviews'])->name('seller.product.reviews');


});



Route::get('/admin/login', [AdminLoginController::class,'index'])->name('admin.login');

Route::get('/about', function () {
    return view('aboutus');
});




Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/seller-requests', [SellerController::class, 'index'])->name('seller.requests');
    Route::patch('/seller-approve/{id}', [SellerController::class, 'approve'])->name('seller.approve');
    Route::delete('/seller-reject/{id}', [SellerController::class, 'reject'])->name('seller.reject');
    Route::get('/seller-statistics/{id}', [AdminDashboardController::class, 'show'])->name('seller.statistics');
    Route::get('/sellers', [AdminDashboardController::class, 'allSellers'])->name('sellers');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::patch('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/product/{id}/reviews', [reviewController::class, 'showReview'])->name('product.reviews');

});


//Route::get('/products', function () {
//    return view('users.seller.comment'); // Ensure your Blade file is named 'products.blade.php'
//});


Route::get('/reset', function () {
    return view('users.resetpassword');
});

Route::get('/confirm password', function () {
    return view('auth.confirm_password');
});



// Password confirmation route
Route::post('/confirm-password', [AuthenticatedSessionController::class, 'confirmPassword'])
    ->middleware('auth')
    ->name('password.confirm');

Route::get('/check-email', function () {
    return view('users.checkemail');
});
Route::get('/verification', function () {
    return view('users.verification');
});
Route::get('/new-password', function () {
    return view('users.createnewpassword');
});
