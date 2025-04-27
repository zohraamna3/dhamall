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

//            Auth::login($user);
            info($validated['Password']);
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

        // Debugging logs

        Log::info('Attempting login for: ' . $request->EmailAddress);
        Log::info( $request->Password);
        // Manual authentication to verify
        $user = User::where('EmailAddress', $request->EmailAddress)->first();

        Log::info( 'user'.$user->Password);

        if ($user && Hash::check($request->Password, $user->Password)) {
            Log::info('Password verified for: ' . $user->EmailAddress);
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Logged in successfully!');
        }

        Log::warning('Failed login attempt for: ' . $request->EmailAddress);
        return back()->withErrors([
            'EmailAddress' => 'Invalid credentials',
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

    public function confirmPassword(Request $request)
    {
        // Validate the password input
        $request->validate(['password' => 'required|string']);

        // Trim the password input
        $trimmedPassword = trim($request->input('password'));

        Log::info($trimmedPassword); // Log the trimmed password for debugging
        Log::info($request->user()); // Log the user's hashed password
        $user = User::where('EmailAddress', $request->user()->EmailAddress)->first();

        if ($user && Hash::check($trimmedPassword, $user->Password)) {
            $token = $request->route('token');

            // Store email in session for the next route
            $request->session()->flash('email', $user->EmailAddress); // Store email in session

            // Redirect to reset password page and pass token in session
            return redirect()->route('password.reset.show')->with('token', $token);
        }

        // If the password does not match, return with an error
        return back()->withErrors(['password' => 'The provided password is incorrect.']);
    }

    public function resetPassword(Request $request)
    {
        // Validate the reset password input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Update the user's password
        $user = User::where('EmailAddress', $request->email)->first();
        Log::info($request->password);
        if ($user) {
            $user->update(['Password' => Hash::make($request->password)]);

            return redirect()->route('home')->with('status', 'Password updated successfully!');
        }

        return back()->withErrors(['EmailAddress' => 'No account found with that email address.']);
    }

}
