<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BuyerCheckoutDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;

class AuthController extends Controller
{
    // Show Sign Up Form
    public function showSignUp()
    {
        return view('auth.register');
    }

    // Handle Sign Up Request
    public function signUp(Request $request)
    {
        try {
            $validated = $request->validate([
                'Name' => 'required|string|max:255',
                'PhoneNumber' => 'required|string|unique:users,PhoneNumber',
                'Gender' => 'required|in:Male,Female,Other',
                'DateOfBirth' => 'required|date',
                'EmailAddress' => 'required|string|email|max:255|unique:users,EmailAddress',
                'Password' => 'required|string|min:6|confirmed',
                'UserRole' => 'required|in:admin,buyer,seller',
                'ImageURL' => 'nullable|string|url',
            ]);

            DB::beginTransaction();

            // Create User
            $user = User::create([
                'Name' => $validated['Name'],
                'PhoneNumber' => $validated['PhoneNumber'],
                'Gender' => $validated['Gender'],
                'DateOfBirth' => $validated['DateOfBirth'],
                'EmailAddress' => $validated['EmailAddress'],
                'Password' => Hash::make($validated['Password']),
                'UserRole' => $validated['UserRole'],
                'ImageURL' => $validated['ImageURL'] ?? null,
            ]);

            // If user is a buyer, initialize checkout details
            if ($validated['UserRole'] === 'buyer') {
                BuyerCheckoutDetail::create([
                    'UserId' => $user->id,
                    'AddressId' => null,
                    'PaymentId' => null,
                ]);
            }

            DB::commit();
            info("DB Commit");

            Auth::login($user);
            info("Login is done");
            return redirect()->route('signin')->with('success', 'Account created successfully. Please log in.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // This will automatically redirect back with errors
            throw $e;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Registration error: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Registration failed. Please try again.');
        }
    }

    // Show Sign In Form
    public function showSignIn()
    {
        return view('auth.login');
    }

    // Handle Sign In Request
    public function signIn(Request $request)
    {
        $request->validate([
            'EmailAddress' => 'required|email',
            'Password' => 'required',
        ]);

        if (Auth::attempt($request->only('EmailAddress', 'Password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/signin')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors([
            'EmailAddress' => 'The provided credentials do not match our records.',
        ])->onlyInput('EmailAddress');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('signin')->with('success', 'Logged out successfully.');
    }
}
