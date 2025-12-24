<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran; // Pastikan Model di-import
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
{
    // SESUAIKAN ISI ARRAY INI DENGAN DATA DI DATABASE (HURUF BESAR/KECILNYA)
    $ukmFikir = ['mc', 'racana', 'rk', 'Debat']; 
    $ukmRaga  = ['basket', 'volly', 'badminton', 'aerobik', 'archery', 'tenismeja'];
    $ukmRasa  = ['tari', 'band', 'tataboga', 'tatarias', 'tatabusana', 'drawing','designrafis', 'photography','hastakarya'];
    $ukmDzikir = ['jmq', 'jhq', 'dakwah', 'hadrah', 'khot'];

    // Hitung masing-masing kategori
    $countFikir = Pendaftaran::whereIn('ukm', $ukmFikir)->count();
    $countRaga  = Pendaftaran::whereIn('ukm', $ukmRaga)->count();
    $countRasa  = Pendaftaran::whereIn('ukm', $ukmRasa)->count();
    $countDzikir = Pendaftaran::whereIn('ukm', $ukmDzikir)->count();

    return view('home', compact('countFikir', 'countRaga', 'countRasa', 'countDzikir'));
}
}