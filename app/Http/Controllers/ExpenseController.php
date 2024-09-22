<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use App\Models\Itinerary;
use App\Models\Trip;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ExpenseController
{
    public function index($trip_id)
    {
        $expenses = Expense::with('itinerary')->where('trip_id', $trip_id)->get();
        $itineraries = Itinerary::where('trip_id', $trip_id)->get();
        $categories = Category::all();
        $trip = Trip::findOrFail($trip_id); // Fetch the selected trip

        return view('Pages.backendpages.expenses', compact('expenses', 'itineraries', 'categories', 'trip'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'trip_id' => 'required|exists:trips,id',
                'itinerary_id' => 'required|exists:itineraries,id',
                'amount' => 'required|numeric|min:0',
                'note' => 'nullable|string|max:255',
            ]);

            Expense::create($request->all());

            return redirect()->back()->with('success', 'Expense added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete subscription: ' . $e->getMessage());
        }
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'itinerary_id' => 'required|exists:itineraries,id',
            'amount' => 'required|numeric|min:0',
            'note' => 'nullable|string|max:255',
        ]);

        $expense->update($request->all());

        return redirect()->back()->with('success', 'Expense updated successfully!');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->back()->with('success', 'Expense deleted successfully!');
    }
    public function generateReport($trip_id)
    {
        $expenses = Expense::with('itinerary')->where('trip_id', $trip_id)->get();

        // Generate PDF using the collected data
        $pdf = Pdf::loadView('Pages.backendpages.report', compact('expenses'));

        // Download the PDF report
        return $pdf->download('expenses_report.pdf');
    }
}
