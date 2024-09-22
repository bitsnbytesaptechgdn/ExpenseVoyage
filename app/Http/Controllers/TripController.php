<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TripController
{
    public function index()
    {
        $trips = Trip::where('user_id', auth()->id())->get();

        return view('Pages.backendpages.trips', compact('trips'));
    }

    // Store a newly created trip in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'total_budget' => 'required|numeric|min:0',
        ]);

        // Handle Image Upload
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/trips', 'public');
        }

        // Create the trip
        $trip = Trip::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $path,
            'total_budget' => $request->total_budget,
            'user_id' => auth()->id(),
        ]);

        ActivityController::logActivity('Created Trip');

        return redirect()->back()->with('success', 'Trip created successfully!');
    }

    // Update the specified trip in storage
    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'total_budget' => 'required|numeric|min:0',
        ]);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            if ($trip->image) {
                Storage::delete('public/' . $trip->image);
            }
            $path = $request->file('image')->store('uploads/trips', 'public');
        } else {
            $path = $trip->image;
        }

        // Update trip data
        $trip->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $path,
            'total_budget' => $request->total_budget,
        ]);

        ActivityController::logActivity('Updated Trip');

        return redirect()->route('trips.index')->with('success', 'Trip updated successfully.');
    }

    // Remove the specified trip from storage
    public function destroy(Trip $trip)
    {
        if ($trip->image) {
            Storage::delete('public/' . $trip->image);
        }
        $trip->delete();

        ActivityController::logActivity('Deleted Trip');

        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully.');
    }

    public function sort(Request $request)
    {
        $sortBy = $request->get('sort_by', 'asc');
        $search = $request->input('search');

        $query = Trip::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        // Apply sorting
        if ($sortBy === 'price_low_to_high') {
            $query->orderBy('total_budget', 'asc');
        } elseif ($sortBy === 'price_high_to_low') {
            $query->orderBy('total_budget', 'desc');
        } elseif ($sortBy === 'name_a_to_z') {
            $query->orderBy('title', 'asc');
        } elseif ($sortBy === 'name_z_to_a') {
            $query->orderBy('title', 'desc');
        }

        $trips = $query->paginate(10);

        return view('Pages.backendpages.trips', compact('trips'));
    }
}
