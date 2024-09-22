<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            // If validation passes, create the contact
            Contact::create($request->all());

            ActivityController::logActivity('Created Contact');

            return redirect()->back()->with('success', 'Contact created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    public function index()
    {
        $contacts = Contact::all();

        return view('Pages.backendpages.contacts', compact('contacts')); // Pass contacts to the view
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            $contact = Contact::findOrFail($id);
            $contact->name = $validated['name'];
            $contact->email = $validated['email'];
            $contact->subject = $validated['subject'];
            $contact->message = $validated['message'];
            $contact->save();

            ActivityController::logActivity('Updated Contact');

            return redirect()->back()->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    // Delete a contact
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        ActivityController::logActivity('Deleted Contact');

        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $sort_by = $request->get('sort', 'asc');

        $query = Contact::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $contacts = $query->orderBy('name', $sort_by)->paginate(10);

        return view('Pages.backendpages.contacts', compact('contacts'));
    }
}
