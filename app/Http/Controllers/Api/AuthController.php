<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // === LOGIN UNIVERSAL (Web + API) ===
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('name', $request->name)->first();

        // ====== VALIDASI USER ======
        if (!$user || !Hash::check($request->password, $user->password)) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
            return back()->withErrors(['name' => 'Invalid username or password.']);
        }

        // ====== LOGIN DARI API (MOBILE) ======
        if ($request->expectsJson()) {
            // ❌ Larang admin login dari mobile
            if ($user->role !== 'nail_artist') {
                return response()->json(['message' => 'Access denied: Admins cannot log in from mobile.'], 403);
            }

            $token = $user->createToken('api_token')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'role' => $user->role,
                ],
                'token' => $token,
                'token_type' => 'Bearer',
            ]);
        }

        // ====== LOGIN DARI WEB ======
        // ❌ Larang nail artist login dari web
        if ($user->role !== 'admin') {
            return back()->withErrors(['access' => 'Access denied: Only admins can log in via web.']);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Welcome back, Admin!');
    }

    // === LOGOUT UNIVERSAL ===
    public function logout(Request $request)
    {
        if ($request->expectsJson()) {
            $request->user()->tokens()->delete();
            return response()->json(['message' => 'Logged out successfully']);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login-page')->with('success', 'You have been logged out.');
    }
}
