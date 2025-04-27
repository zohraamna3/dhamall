<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentDetail;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $user->load([
            'orders.items.product',
            'wishlist.items.product',
            'cart.items.product',
            'paymentDetails', // This returns a collection
            'notifications',
            'addresses' // Load the addresses relationship
        ]);

        return view('users.buyer.profile.profile-page', [
            'user' => $user,
            'orders' => $user->orders,
            'wishlist' => $user->wishlist ? $user->wishlist->items : collect(),
            'cart' => $user->cart ? $user->cart->items : collect(),
            'paymentDetails' => $user->paymentDetails->first(), // Get first item or null
            'addressDetails' => $user->addresses // Pass the addresses collection to the view
        ]);
    }

}
