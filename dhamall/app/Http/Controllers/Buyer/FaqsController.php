<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Faqs;

class FaqsController extends Controller
{
    public function index()
    {
        // Retrieve all FAQs data from the database
        $faqs = Faqs::all();

        // Return the FAQs page view with the data
        return view('users.buyer.pages.faqs', compact('faqs'));
    }
}
