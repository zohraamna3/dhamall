<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\ReturnsAndRefunds;

class ReturnsAndRefundsController extends Controller
{
    public function index()
    {
        // Fetch returns and refunds policies grouped by PolicyType
        $returns = ReturnsAndRefunds::where('PolicyType', 'Returns')->get();
        $refunds = ReturnsAndRefunds::where('PolicyType', 'Refunds')->get();

        // Pass the data to the view
        return view('users.buyer.pages.returns-refunds', compact('returns', 'refunds'));
    }
}
