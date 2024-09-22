<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Itinerary;
use Illuminate\Http\Request;

class ItineraryController
{
    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'budget' => 'required|numeric|min:0',
        ]);

        Itinerary::create($request->all());

        // ActivityController::logActivity('Itinerary Created');

        return redirect()->back()->with('success', 'Itinerary added successfully!');
    }

    public function update(Request $request, Itinerary $itinerary)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'budget' => 'required|numeric|min:0',
        ]);

        $itinerary->update($request->all());

        ActivityController::logActivity('Itinerary Updated');

        return redirect()->back()->with('success', 'Itinerary updated successfully!');
    }

    public function destroy(Itinerary $itinerary)
    {
        $itinerary->delete();

        ActivityController::logActivity('Itinerary Deleted');

        return redirect()->back()->with('success', 'Itinerary deleted successfully!');
    }
}
