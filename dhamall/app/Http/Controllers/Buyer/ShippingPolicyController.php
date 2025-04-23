<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\ShippingPolicy;

class ShippingPolicyController extends Controller
{
    public function index()
    {
        $allPolicies = ShippingPolicy::orderBy('created_at', 'desc')->get();
        return view('users.buyer.pages.shipping-policy', compact('allPolicies'));
    }
}
