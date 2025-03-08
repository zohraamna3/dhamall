<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth; // Add this line to import the Auth facade


class AuthenticatedSessionController extends Controller
{

    public function confirmPassword(Request $request)
    {
        if (! Hash::check($request->password, $request->user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('The provided password does not match your current password.')],
            ]);
        }

        $request->session()->passwordConfirmed();

        return redirect()->intended();
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout(); // Logout the user

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/'); // Redirect to the homepage or any other route
    }
}
