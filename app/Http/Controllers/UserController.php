<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new user.
     */
    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:Admin,user,Értékesítő,Szerelő',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        return response()->json(['message' => 'Felhasználó létrehozva!']);
    }

    /**
     * Update a user's role.
     */
    public function updateUserRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:Admin,user,Értékesítő,Szerelő',
        ]);

        $user->update(['role' => $validated['role']]);

        return response()->json(['message' => 'Szerepkör frissítve!']);
    }
}
