<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index()
    {
        // Retrieve the About Us data from the database
        $aboutUs = AboutUs::first();

        // Return the About Us page view with the data
        return view('users.buyer.pages.about-us', compact('aboutUs'));
    }
}
