<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Import the User model

class AddUserController extends Controller
{
    // Function to register a user by an admin
    public function addUser(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin,szerelo', // Ensure role is valid
        ]);
    
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'], // Assign the validated role
        ]);

        

        // Redirect to the cars index or any other page
        return redirect()->route('cars.index')->with('success', 'User added successfully!');
    }

    // Display the form to add a new user
    public function showAddUserForm()
    {
        return view('cars.adduser'); // View for the admin to register users
    }
}