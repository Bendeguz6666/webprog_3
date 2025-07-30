<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; // Import the Admin model
use App\Models\User;
class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showForm()
    {
        return view('auth.login'); // Ensure this is the correct path to your login view
    }

    /**
     * Handle the login process.
     */
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        


        $user = User::where('email', $request->email)->first();


        if ($user && Hash::check($request->password, $user->password)) {

            Auth::login($user);


            return redirect()->route('cars.index')->with('success', 'Logged in successfully!');
        }

    
        return redirect()->route('auth.showForm')->withErrors(['email' => 'Invalid credentials']);
    }
    

    

}

//fb