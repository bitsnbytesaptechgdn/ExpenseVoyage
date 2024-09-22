<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionController
{
    public function subscribe(Request $request)
    {
        $currentDate = Carbon::now();
        $endDate = $currentDate->copy()->addMonth(); // Copy to avoid modifying the original Carbon instance

        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
            'payment_type' => 'required|string',
        ]);
        // Assuming the user is authenticated
        $user = auth()->user();

        // Create the subscription using mass assignment
        try {
            $subscription = Subscription::create([
                'user_id' => $user->id,
                'email' => $request->email, // Use the email from the request
                'phone' => $request->phone,
                'status' => 'active',
            ]);

            // Update the user with the subscription ID
            $user->subscription_id = $subscription->id;
            $user->save();

            ActivityController::logActivity('Subscribed');

            return redirect()->back()->with('success', 'Subscription successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create subscription: ' . $e->getMessage());
        }
    }

    public function index()
    {
        // Fetch all subscriptions
        $subscriptions = Subscription::all();

        // Pass subscriptions to the view
        return view('Pages.backendpages.subscriptions', compact('subscriptions'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|string|email|max:255',
                'phone' => 'required|string',
                'status' => 'required|in:active,inactive',
            ]);

            $subscription = Subscription::findOrFail($id);
            $subscription->email = $validated['email'];
            $subscription->phone = $validated['phone'];
            $subscription->status = $validated['status'];
            $subscription->save();

            ActivityController::logActivity('Subscriber Edited');

            return redirect()->back()->with('success', 'Subscription updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update subscription: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $subscription = Subscription::findOrFail($id);
            $subscription->delete();

            ActivityController::logActivity('Subscriber Deleted');

            return redirect()->back()->with('success', 'Subscription deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete subscription: ' . $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $sort_by = $request->get('sort', 'asc');
        $query = Subscription::query();
        if ($search) {
            $query->where('email', 'like', '%' . $search . '%');
        }
        $subscriptions = $query->orderBy('email', $sort_by)->paginate(10);
        return view('Pages.backendpages.subscriptions', compact('subscriptions'));
    }
}
