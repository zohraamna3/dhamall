<?php

use App\Http\Controllers\Admin\AdminFaqsController;
use App\Http\Controllers\Admin\AdminReturnsAndRefundsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Buyer\AboutUsController;
use App\Http\Controllers\Buyer\CartController;
use App\Http\Controllers\Buyer\CheckoutController;
use App\Http\Controllers\Buyer\ContactUsController;
use App\Http\Controllers\Buyer\FaqsController;
use App\Http\Controllers\Buyer\FeedbackController;
use App\Http\Controllers\Buyer\HomeController;
use App\Http\Controllers\Buyer\ProductController;
use App\Http\Controllers\Buyer\ReturnsAndRefundsController;
use App\Http\Controllers\Buyer\SearchController;
use App\Http\Controllers\Buyer\TermsAndConditionsController;
use Illuminate\Support\Facades\Route;


// Authentication Routes
Route::get('/signin', [AuthController::class, 'showSignIn'])->name('signin');
Route::post('/signin', [AuthController::class, 'signIn'])->name('login');

Route::get('/signup', [AuthController::class, 'showSignUp'])->name('signup');
Route::post('/signup', [AuthController::class, 'signUp'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/contact-us', function () {
    return view('users.buyer.pages.contact-us');
})->name('contact-us');

Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact-us.store');

Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

Route::get('/faqs', [FaqsController::class, 'index'])->name('faqs');



Route::get('/returns-refunds', [ReturnsAndRefundsController::class, 'index'])->name('returns-refunds');

Route::get('/feedback', function () {
    return view('users.buyer.pages.feedback');
})->name('feedback');

Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');


Route::get('/terms-conditions', [TermsAndConditionsController::class, 'index'])->name('terms-conditions');

// Buyer route
Route::get('/privacy-policy', [\App\Http\Controllers\Buyer\PrivacyPolicyController::class, 'index'])
    ->name('privacy-policy');


// Buyer route
Route::get('/shipping-policy', [\App\Http\Controllers\Buyer\ShippingPolicyController::class, 'index'])
    ->name('shipping-policy');

// Profile route
Route::get('/profile', [\App\Http\Controllers\Buyer\ProfileController::class, 'index'])
    ->middleware('auth')
    ->name('profile.edit');


// Notification routes
Route::post('/notifications/{notification}/mark-as-read', function ($notificationId) {
    $notification = \App\Models\Notification::findOrFail($notificationId);
    $notification->update(['Status' => 'Viewed']);
    return response()->json(['success' => true]);
})->middleware('auth')->name('notifications.mark-as-read');

// Payment routes
Route::prefix('payment')->middleware('auth')->group(function () {
    Route::get('/create', [\App\Http\Controllers\Buyer\PaymentController::class, 'create'])->name('payment.create');
    Route::post('/store', [\App\Http\Controllers\Buyer\PaymentController::class, 'store'])->name('payment.store');
    Route::post('/update/{paymentDetail}', [\App\Http\Controllers\Buyer\PaymentController::class, 'update'])->name('payment.update');
});

use App\Http\Controllers\Buyer\AddressController;

// Add your routes for addresses
Route::prefix('address')->middleware('auth')->group(function () {
    Route::get('/create', [AddressController::class, 'create'])->name('address.create');
    Route::post('/store', [AddressController::class, 'store'])->name('address.store');
    Route::post('/update/{address}', [AddressController::class, 'update'])->name('address.update');
});
// Product routes
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
});


// Checkout routes
Route::prefix('checkout')->middleware(['auth'])->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
});// Reviews routes
Route::middleware(['auth'])->group(function () {
    Route::post('/products/{product}/reviews', [ProductController::class, 'storeReview'])
        ->name('reviews.store');
});

// Cart routes
Route::prefix('cart')->middleware(['auth'])->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('/update/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');
});




// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('shipping-policy', \App\Http\Controllers\Admin\ShippingPolicyController::class)
        ->names([
            'index' => 'admin.shipping-policy.index',
            'create' => 'admin.shipping-policy.create',
            'store' => 'admin.shipping-policy.store',
            'edit' => 'admin.shipping-policy.edit',
            'update' => 'admin.shipping-policy.update',
            'destroy' => 'admin.shipping-policy.destroy',
        ]);
});

// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('privacy-policy', \App\Http\Controllers\Admin\PrivacyPolicyController::class)
        ->names([
            'index' => 'admin.privacy-policy.index',
            'create' => 'admin.privacy-policy.create',
            'store' => 'admin.privacy-policy.store',
            'edit' => 'admin.privacy-policy.edit',
            'update' => 'admin.privacy-policy.update',
            'destroy' => 'admin.privacy-policy.destroy',
        ]);
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('faqs', [AdminFaqsController::class, 'index'])->name('admin.faqs.index');
    Route::get('faqs/create', [AdminFaqsController::class, 'create'])->name('admin.faqs.create');
    Route::post('faqs', [AdminFaqsController::class, 'store'])->name('admin.faqs.store');
    Route::get('faqs/{id}/edit', [AdminFaqsController::class, 'edit'])->name('admin.faqs.edit');
    Route::put('faqs/{id}', [AdminFaqsController::class, 'update'])->name('admin.faqs.update');
    Route::delete('faqs/{id}', [AdminFaqsController::class, 'destroy'])->name('admin.faqs.destroy');
});



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('returns-refunds', [AdminReturnsAndRefundsController::class, 'index'])->name('admin.returns-refunds.index');
    Route::get('returns-refunds/create', [AdminReturnsAndRefundsController::class, 'create'])->name('admin.returns-refunds.create');
    Route::post('returns-refunds', [AdminReturnsAndRefundsController::class, 'store'])->name('admin.returns-refunds.store');
    Route::get('returns-refunds/{id}/edit', [AdminReturnsAndRefundsController::class, 'edit'])->name('admin.returns-refunds.edit');
    Route::put('returns-refunds/{id}', [AdminReturnsAndRefundsController::class, 'update'])->name('admin.returns-refunds.update');
    Route::delete('returns-refunds/{id}', [AdminReturnsAndRefundsController::class, 'destroy'])->name('admin.returns-refunds.destroy');
});



Route::prefix('admin')->group(function () {
    Route::resource('terms-and-conditions', \App\Http\Controllers\Admin\TermsAndConditionsController::class)
        ->names([
            'index' => 'admin.terms-and-conditions.index',
            'create' => 'admin.terms-and-conditions.create',
            'store' => 'admin.terms-and-conditions.store',
            'edit' => 'admin.terms-and-conditions.edit',
            'update' => 'admin.terms-and-conditions.update',
            'destroy' => 'admin.terms-and-conditions.destroy',
        ]);
});


// Home Route (Earbuds E-commerce Homepage)
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/search', [SearchController::class, 'index'])->name('search');


// Password Confirmation and Reset Routes
Route::get('/password/confirm', function() {
    return view('auth.confirm_password');
})->middleware('auth')->name('password.confirm.show');

Route::post('/password/confirm', [AuthController::class, 'confirmPassword'])->middleware('auth')->name('password.confirm');

Route::get('/password/reset', function() {
    return view('auth.reset_password'); // Ensure this matches your reset password route
})->middleware('auth')->name('password.reset.show');

Route::post('/password/reset', [AuthController::class, 'resetPassword'])->middleware('auth')->name('password.store');


use App\Http\Controllers\Buyer\WishlistController;

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{item}', [WishlistController::class, 'remove'])->name('wishlist.remove');
});
