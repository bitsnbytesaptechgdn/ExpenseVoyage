<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AuthController
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // Return the registration form view
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Confirm password field
            'currency' => 'required|in:usd,euro,gbp,pkr',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Image validation
        ]);

        // Hash the password
        $validated['password'] = bcrypt($validated['password']); // Ensure password is hashed

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/users', 'public');
            $validated['image'] = $imagePath;
        }

        // Create the user
        $user = User::create($validated);

        // Log the user in automatically
        Auth::login($user);

        ActivityController::logActivity('Registered');

        // Redirect with success message
        return redirect()->route('admin')->with('success', 'Registered and logged in successfully');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {

            ActivityController::logActivity('Login');

            return redirect()->intended('admin'); // Redirect to intended or default page
        }

        return redirect()->route('admin')->with('error', 'The provided credentials do not match our records');
    }

    public function logout(Request $request)
    {
        ActivityController::logActivity('Logout');

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('status', 'Successfully logged out!');
    }

    public function showForgotForm()
    {
        return view('Pages.authpages.email'); // The form to request a password reset
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(60);

        // Insert or update the reset token in the database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => Hash::make($token),
                'created_at' => now(),
            ]
        );

        // Send password reset email
        $resetLink = route('password.reset', ['token' => $token, 'email' => $request->email]);

        Mail::send('Emails.password', ['resetLink' => $resetLink], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset your password');
        });

        return back()->with('status', 'We have emailed your password reset link!');
    }

    public function showResetForm($token, Request $request)
    {
        return view('Pages.authpages.reset', ['token' => $token, 'email' => $request->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);

        // Check if the token matches
        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$resetRecord || !Hash::check($request->token, $resetRecord->token)) {
            return back()->withErrors(['email' => 'Invalid token or email']);
        }

        // Update the user's password
        $user = User::where('email', $request->email)->first();
        $user->password = $request->password;
        $user->save();

        // Delete the token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        ActivityController::logActivity('Changed Password');

        return redirect()->route('login')->with('status', 'Password has been reset successfully!');
    }


}

