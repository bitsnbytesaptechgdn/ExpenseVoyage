<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController
{
    public function index()
    {
        return view('pages.backendpages.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|confirmed|min:8',
            'currency' => 'required|in:usd,euro,gbp,pkr',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the user's name
        $user->name = $request->input('name');

        // Update the user's currency
        $user->currency = strtoupper($request->input('currency')); // Save as uppercase (USD, EURO, GBP, PKR)

        // Update the password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Handle profile image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }

            // Store new image
            $user->image = $request->file('image')->store('profile', 'public');
        }

        // Save the changes
        $user->save();

        ActivityController::logActivity('Profile Updated');

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy()
    {
        $user = Auth::user();

        // Delete the profile image if exists
        if ($user->image && Storage::exists($user->image)) {
            Storage::delete($user->image);
        }

        // Delete the user account
        $user->delete();

        return redirect('/login')->with('success', 'Account deleted successfully.');
    }
}
