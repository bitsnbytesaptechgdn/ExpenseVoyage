<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use App\Models\Itinerary;
use App\Models\Trip;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController
{
    public function index()
    {
        $userId = Auth::id(); // Get the currently authenticated user ID

        $totalTrips = Trip::where('user_id', $userId)->count();
        $totalCategories = Category::count();
        $totalUsers = User::count();
        $premiumUsers = User::where('subscription_id', '!=', null)->count(); // Assuming premium users have a non-null subscription ID
        $totalItineraries = Itinerary::whereHas('trip', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();
        $totalExpenses = Expense::whereHas('trip', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        return view('Pages.backendpages.index', compact('totalTrips', 'totalCategories', 'totalUsers', 'premiumUsers', 'totalItineraries', 'totalExpenses'));
    }
}
