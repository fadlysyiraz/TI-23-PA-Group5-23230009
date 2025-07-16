<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('auth.signin');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Redirect sesuai role
            $user = Auth::user();
            if ($user && $user->role === 'admin') {
                return redirect()->route('home'); // homeAdmin
            } else {
                return redirect()->route('home.admin'); // home biasa
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Tampilkan halaman register
    public function showRegister()
    {
        return view('auth.signup');
    }

    // Proses register
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
            'role' => ['required', 'in:mahasiswa,dosen,admin'],
        ]);

        // Cek jika email sudah terdaftar (satu user hanya 1 akun)
        if (User::where('email', $validated['email'])->exists()) {
            return back()->withErrors(['email' => 'Email sudah terdaftar.']);
        }

        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        // Auto login setelah register
        Auth::login($user);
        if ($user->role === 'admin') {
            return redirect()->route('home')->with('success', 'Registrasi berhasil, selamat datang admin!');
        } else {
            return redirect()->route('home.admin')->with('success', 'Registrasi berhasil, selamat datang!');
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
