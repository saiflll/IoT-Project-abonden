<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Register a new user
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin', // Assuming roles are 'user' and 'admin'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login-view')->with('success', 'Pendaftaran berhasil, silakan login.');
    }

    /**
     * Login a user
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login berhasil');
        }

        return redirect()->back()->withErrors(['email' => 'Email atau kata sandi salah'])->withInput();
    }

    /**
     * Logout the user
     */
    public function logout(Request $request)
    {
        // Ensure we are using the web guard
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login-view')->with('success', 'Logout berhasil');
    }

    /**
     * Get the authenticated user
     */
    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Check user role
     */
    public function checkRole(Request $request, $role)
    {
        if ($request->user()->role == $role) {
            return response()->json(['message' => 'User has the role: ' . $role]);
        }

        return response()->json(['message' => 'User does not have the role: ' . $role], 403);
    }
}