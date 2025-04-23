<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Determine UserRole
        $userRole = Auth::check() ? Auth::user()->UserRole : 'visitor';

        // Create ContactUs entry
        ContactUs::create([
            'Name' => $validatedData['name'],
            'Email' => $validatedData['email'],
            'Message' => $validatedData['message'],
            'UserRole' => $userRole,
            'Status' => 'Pending',
        ]);

        return redirect()->route('contact-us')->with('success', 'Thank you for contacting us!');
    }
}
