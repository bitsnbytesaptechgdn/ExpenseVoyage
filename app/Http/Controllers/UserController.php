<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController
{
    public function index()
    {
        $users = User::paginate(10);
        return view('Pages.backendpages.users', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:user,admin',
            'currency' => 'required|in:usd,euro,gbp,pkr',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['password'] = $validated['password'];

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/users', 'public');
            $validated['image'] = $imagePath;
        }

        User::create($validated);

        ActivityController::logActivity('Created User');

        return redirect()->back()->with('success', 'User created successfully!');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:user,admin',
            'currency' => 'required|in:usd,euro,gbp,pkr',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle password update
        if ($request->filled('password')) {
            $validated['password'] = $validated['password'];
        } else {
            unset($validated['password']);
        }

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            $imagePath = $request->file('image')->store('uploads/users', 'public');
            $validated['image'] = $imagePath;
        }

        $user->update($validated);

        ActivityController::logActivity('Updated User');

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        ActivityController::logActivity('Deleted User');

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $sort_by = $request->get('sort', 'asc');
        $role = $request->get('role');

        $query = User::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($role) {
            $query->where('role', $role);
        }

        $users = $query->orderBy('name', $sort_by)->paginate(10);

        return view('Pages.backendpages.users', compact('users'));
    }

}
