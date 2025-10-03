<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // --- REGISTER ---

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' cocok dengan input 'password_confirmation'
        ]);

        $user = User::create([
            'name' => $request->username, // Ganti 'name' di tabel users dengan 'username' jika perlu
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Otomatis login setelah register

        return redirect('/admin/products'); // Arahkan ke dashboard produk
    }

    // --- LOGIN ---

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email', // Gunakan email atau username tergantung setup DB
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/products'); // Arahkan ke URL tujuan atau default
        }

        return back()->withErrors([
            'email' => 'Email atau Kata Sandi salah.',
        ])->onlyInput('email');
    }

    // --- LOGOUT ---

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Arahkan kembali ke homepage
    }
}