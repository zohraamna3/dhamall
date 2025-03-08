<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

        Log::info($request->name);
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|unique:users',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Default role
        ]);

        Auth::login($user);


        return redirect()->route('signin')->with('success', 'Account created successfully.');
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
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('signin')->with('success', 'Logged out successfully.');
    }
}
