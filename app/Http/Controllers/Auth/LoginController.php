<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('login.login'); // Ensure the correct path for the login view
    }

    // Handle login
    public function login(Request $request)
    {
        // Validate the input data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Try to find the user by email
        $user = User::where('email', $request->email)->first();

        // If user does not exist
        if (!$user) {
            return back()->withErrors([
                'email' => 'The email address is not registered in the system.',
            ]);
        }

        // If user exists, check if the password matches
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'The password is incorrect.',
            ]);
        }

        // If authentication is successful, log in the user
        Auth::login($user);

        // Redirect based on the user's role
        if ($user->role_id === 1) {
            return redirect()->intended('/home'); // Regular user
        } elseif ($user->role_id === 2 || $user->role_id === 3) {
            return redirect()->intended('/admin'); // Admin or Super Admin
        }

        // Default redirect if no role matched
        return redirect()->intended('/home');
    }
}
