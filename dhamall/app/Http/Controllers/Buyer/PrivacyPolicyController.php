<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $allPolicies = PrivacyPolicy::orderBy('created_at', 'desc')->get();
        return view('users.buyer.pages.privacy-policy', compact('allPolicies'));
    }
}
