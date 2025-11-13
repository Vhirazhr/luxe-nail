<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // -------------------- LOGIN --------------------
    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'nullable|email',
            'username' => 'nullable|string',
        ]);

        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');

        // Tentukan kredensial yang dipakai (email atau username)
        if ($email) {
            $credentials = ['email' => $email, 'password' => $password];
        } elseif ($username) {
            $credentials = ['name' => $username, 'password' => $password];
        } else {
            if (!$request->expectsJson()) {
                return back()->withErrors(['login' => 'Email atau username harus diisi!']);
            }
            return response()->json(['message' => 'Email or username is required'], 422);
        }

        // Cek login valid atau tidak
        if (!Auth::attempt($credentials)) {
            if (!$request->expectsJson()) {
                return back()->withErrors(['login' => 'Email atau password salah!']);
            }
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('api_token')->plainTextToken;

        // 🔹 Kalau dari API / Postman
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Login successful',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ]);
        }

        // 🔹 Kalau dari form web biasa
        return redirect('/dashboard')->with('success', 'Login berhasil!');
    }

    // -------------------- LOGOUT --------------------
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Logged out']);
        }

        Auth::logout();
        return redirect('/login-page')->with('success', 'Berhasil logout!');
    }
}
