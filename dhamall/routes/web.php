<?php

use App\Http\Controllers\Admin\AdminFaqsController;
use App\Http\Controllers\Admin\AdminReturnsAndRefundsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Buyer\AboutUsController;
use App\Http\Controllers\Buyer\ContactUsController;
use App\Http\Controllers\Buyer\FaqsController;
use App\Http\Controllers\Buyer\FeedbackController;
use App\Http\Controllers\Buyer\ReturnsAndRefundsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Buyer\TermsAndConditionsController;

//use App\Http\Controllers\Auth\PasswordResetLinkController;
//use App\Http\Controllers\HomeController;
//use App\Http\Controllers\ProductController;
//use App\Http\Controllers\CheckoutController;
//use App\Http\Controllers\SearchController;
//use App\Http\Controllers\SellerController;
//use  App\Http\Controllers\Admin\AdminDashboardController;
//use  App\Http\Controllers\Admin\AdminLoginController;
//use  App\Http\Controllers\CategoryController;
//use  App\Http\Controllers\ReviewController;
//use App\Http\Controllers\AuthenticatedSessionController;


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
    Route::get('/create', [\App\Http\Controllers\PaymentController::class, 'create'])->name('payment.create');
    Route::post('/store', [\App\Http\Controllers\PaymentController::class, 'store'])->name('payment.store');
    Route::put('/update/{paymentDetail}', [\App\Http\Controllers\PaymentController::class, 'update'])->name('payment.update');
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
//Route::get('/', [HomeController::class, 'index'])->name('home');

// Profile Route
//Route::get('/profile', function () {
//    $user = Auth::user(); // Get the logged-in user
//
//    $orders = DB::table('orders')
//        ->where('user_id', $user->id)
//        ->get()
//        ->map(function ($order) {
//            $order->orderItems = DB::table('order_items')
//                ->where('order_id', $order->id)
//                ->get();
//            return $order;
//        });
//
//    $paymentDetails = DB::table('user_payment_details')->where('user_id', $user->id)->first();
//    $wishlist = DB::table('wishlist')->where('user_id', $user->id)->get();
//    $shoppingCart = DB::table('shopping_cart')->where('user_id', $user->id)->get();
//
//    return view('users.buyer.profile.profile-page', compact('orders', 'wishlist', 'shoppingCart', 'paymentDetails'));
//})->middleware('auth')->name('profile.edit');
//
//
//
//// Payment Update Route
//Route::post('/profile/payment/update', function (Illuminate\Http\Request $request) {
//    $user = Auth::user();
//
//    $validated = $request->validate([
//        'payment_type'   => 'required|string',
//        'account_number' => 'nullable|string|max:20',
//        'expiry_date'    => 'nullable|date',
//        'paypal_email'   => 'nullable|email',
//        'bank_name'      => 'nullable|string|max:100',
//        'is_default'     => 'nullable|boolean',
//    ]);
//
//    $existingPayment = DB::table('user_payment_details')->where('user_id', $user->id)->first();
//
//    if ($existingPayment) {
//        DB::table('user_payment_details')
//            ->where('user_id', $user->id)
//            ->update([
//                'payment_type'   => $validated['payment_type'],
//                'account_number' => $validated['account_number'] ?? null,
//                'expiry_date'    => $validated['expiry_date'] ?? null,
//                'paypal_email'   => $validated['paypal_email'] ?? null,
//                'bank_name'      => $validated['bank_name'] ?? null,
//                'is_default'     => $request->has('is_default') ? 1 : 0,
//                'updated_at'     => now(),
//            ]);
//    } else {
//        DB::table('user_payment_details')->insert([
//            'user_id'        => $user->id,
//            'payment_type'   => $validated['payment_type'],
//            'account_number' => $validated['account_number'] ?? null,
//            'expiry_date'    => $validated['expiry_date'] ?? null,
//            'paypal_email'   => $validated['paypal_email'] ?? null,
//            'bank_name'      => $validated['bank_name'] ?? null,
//            'is_default'     => $request->has('is_default') ? 1 : 0,
//            'created_at'     => now(),
//            'updated_at'     => now(),
//        ]);
//    }
//
//    return redirect('/profile')->with('success', 'Payment details updated successfully.');
//})->middleware('auth')->name('payment.update');
//
//
//
//Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
//
//
//Route::middleware(['auth'])->group(function () {
//Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('review.store');
//    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
//    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
//    Route::post('/checkout/update', [CheckoutController::class, 'update'])->name('checkout.update');
//
//});
//
//Route::get('/search', [SearchController::class, 'index'])->name('search');
//
//Route::prefix('seller')->group(function () {
//    Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
//    Route::get('/products', [SellerController::class, 'products'])->name('seller.products');
//    Route::get('/profile', [SellerController::class, 'profile'])->name('seller.profile');
//    Route::post('/profile/update', [SellerController::class, 'updateProfile'])->name('seller.updateProfile');
//    Route::get('/orders', [SellerController::class, 'orders'])->name('seller.orders'); // Ensure this exists
//    Route::get('/reviews', [SellerController::class, 'reviews'])->name('seller.reviews');
//    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
//    Route::post('/profile/update', [SellerController::class, 'updateProfile'])->name('seller.profile.update');
//    Route::get('/seller/products', [SellerController::class, 'productListings'])->name('seller.product_listings');
//    Route::get('/product/{id}/reviews', [reviewController::class, 'showReviews'])->name('seller.product.reviews');
//
//
//});
//
//
//
//Route::get('/admin/login', [AdminLoginController::class,'index'])->name('admin.login');
//
//Route::get('/about', function () {
//    return view('aboutus');
//});
//
//
//
//
//Route::prefix('admin')->name('admin.')->group(function () {
//    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
//    Route::get('/seller-requests', [SellerController::class, 'index'])->name('seller.requests');
//    Route::patch('/seller-approve/{id}', [SellerController::class, 'approve'])->name('seller.approve');
//    Route::delete('/seller-reject/{id}', [SellerController::class, 'reject'])->name('seller.reject');
//    Route::get('/seller-statistics/{id}', [AdminDashboardController::class, 'show'])->name('seller.statistics');
//    Route::get('/sellers', [AdminDashboardController::class, 'allSellers'])->name('sellers');
//    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
//    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
//    Route::patch('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
//    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
//    Route::get('/product/{id}/reviews', [reviewController::class, 'showReview'])->name('product.reviews');
//
//});
//
//
////Route::get('/products', function () {
////    return view('users.seller.comment'); // Ensure your Blade file is named 'products.blade.php'
////});
//
//
//Route::get('/reset', function () {
//    return view('users.resetpassword');
//});
//
//Route::get('/confirm password', function () {
//    return view('auth.confirm_password');
//});
//
//
//
//// Password confirmation route
//Route::post('/confirm-password', [AuthenticatedSessionController::class, 'confirmPassword'])
//    ->middleware('auth')
//    ->name('password.confirm');
//
//Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
//    ->middleware('guest')
//    ->name('password.request');
//
//Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
//    ->middleware('guest')
//    ->name('password.email');
//
//Route::get('/check-email', function () {
//    return view('users.checkemail');
//});
//Route::get('/verification', function () {
//    return view('users.verification');
//});
//Route::get('/new-password', function () {
//    return view('users.createnewpassword');
//});
//
//
//
//Route::get('/privacy-policy', function () {
//    return view('users.buyer.pages.privacy-policy');
//})->name('privacy-policy');
//Route::get('/shipping-policy', function () {
//    return view('users.buyer.pages.shipping-policy');
//})->name('shipping-policy');
//
//
//
//Route::get('/collaboration', function () {
//    return view('users.buyer.pages.collaboration');
//})->name('collaboration');
//
//
//
//Route::get('/career', function () {
//    return view('users.buyer.pages.career');
//})->name('career');
//
//// Seller Support Pages
//Route::get('/help-center', function () {
//    return view('users.seller.pages.help-center');
//})->name('help-center');
//
//Route::get('/seller-guidelines', function () {
//    return view('users.seller.pages.seller-guidelines');
//})->name('seller-guidelines');
//
//Route::get('/contact-support', function () {
//    return view('users.seller.pages.contact-support');
//})->name('contact-support');
//
//Route::get('/faqs-seller', function () {
//    return view('users.seller.pages.faqs-seller');
//})->name('faqs-seller');
//
//// Legal Pages
//Route::get('/terms-of-service', function () {
//    return view('users.seller.pages.terms-of-service');
//})->name('terms-of-service');
//
//Route::get('/seller/privacy-policy', function () {
//    return view('users.seller.pages.privacy-policy');
//})->name('privacy-policy-seller');
//
//Route::get('/seller-agreement', function () {
//    return view('users.seller.pages.seller-agreement');
//})->name('seller-agreement');
//
//use App\Http\Controllers\Auth\NewPasswordController;
//
//// Password Reset Routes
//Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
//    ->middleware('guest')
//    ->name('password.reset');
//
//Route::post('/reset-password', [NewPasswordController::class, 'store'])
//    ->middleware('guest')
//    ->name('password.update');
