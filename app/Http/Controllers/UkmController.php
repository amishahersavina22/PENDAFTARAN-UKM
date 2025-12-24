<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FotoUkm;
use App\Models\JadwalUkm;
use App\Models\Pendaftaran; 

class UkmController extends Controller
{

   public function show($nama) 
{
    // 1. Ambil data banner (satu data saja)
    $banner = \App\Models\FotoUkm::where('ukm', $nama)->first();

    // 2. Ambil jadwal dan daftar anggota (kumpulan data/collection)
    $jadwal = \App\Models\JadwalUkm::where('ukm', $nama)->get();
    $anggota = \App\Models\Pendaftaran::where('ukm', $nama)->get();

    // 3. Kirim semua variabel ke view ukm/show.blade.php
    return view('ukm.show', [
        'ukm' => $nama,
        'banner' => $banner,
        'jadwal' => $jadwal,
        'anggota' => $anggota
    ]);
}

   public function olahRaga() {
    $nama_ukm = ['basket', 'volly', 'badminton', 'aerobik', 'archery', 'tenismeja']; 
    
    // Ambil SEMUA data untuk looping tombol di bawah
    $semua_ukm = \App\Models\JadwalUkm::whereIn('ukm', $nama_ukm)->get();
    
    $jadwal = \App\Models\JadwalUkm::whereIn('ukm', $nama_ukm)->first(); 
    $banner = \App\Models\FotoUkm::whereIn('ukm', $nama_ukm)->first();
 
    return view('kategori.raga', compact('semua_ukm', 'jadwal', 'banner'));
}

    public function olahDzikir() {
        // Tulis manual nama UKM dzikir
        $nama_ukm = ['jmq', 'jhq', 'dakwah', 'hadrah', 'khot'];
        
        $list_ukm = FotoUkm::whereIn('ukm', $nama_ukm)->get();
        
        return view('kategori.dzikir', compact('list_ukm'));
    }

    public function olahFikir() {
        $nama_ukm = ['mc', 'racana', 'rk', 'Debat'];
        
        $list_ukm = FotoUkm::whereIn('ukm', $nama_ukm)->get();
        
        return view('kategori.fikir', compact('list_ukm'));
    }

    public function olahRasa() {
        $nama_ukm = ['tari', 'band', 'tataboga', 'tatarias', 'tatabusana', 'drawing','designrafis', 'photography','hastakarya'];
        
        $list_ukm = FotoUkm::whereIn('ukm', $nama_ukm)->get();
        
        return view('kategori.rasa', compact('list_ukm'));
    }
 
}
