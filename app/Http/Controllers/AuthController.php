<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        
        // UBAH BARIS INI: Dari '/dashboard' menjadi '/admin/main'
        return redirect()->intended('/admin/main'); 
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

        return redirect('/login');
    }

    public function admin()
{
    // Ini mengarah ke file resources/views/admin/main.blade.php (atau sesuaikan dengan folder kamu)
    return view('admin.main'); 
}
}
