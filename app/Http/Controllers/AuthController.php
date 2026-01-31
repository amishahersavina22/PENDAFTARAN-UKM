<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login'); // atau admin.login kalau mau dipisah
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 🔑 BEDA ADMIN & USER
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.main');
            }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // FORM REGISTER USER
public function showRegisterUser()
{
    return view('loginuser');
}

// PROSES REGISTER USER
public function registerUser(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user', // 🔑 PENTING
    ]);

    return redirect()->route('login')
        ->with('success', 'Akun berhasil dibuat, silakan login');
}



}
