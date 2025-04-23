<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\TermsAndCondition;

class TermsAndConditionsController extends Controller
{
    public function index()
    {
        $allTerms = TermsAndCondition::orderBy('created_at', 'desc')->get();
        return view('users.buyer.pages.terms-conditions', compact('allTerms'));
    }
}
