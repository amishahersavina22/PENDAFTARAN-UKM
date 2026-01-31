<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Untuk tampilan publik (User)
        public function index()
    {
        // Mengambil data dari tabel news melalui Model News
        $berita = \App\Models\News::orderBy('tanggal', 'DESC')->get();

        // Mengirim data ke file resources/views/news.blade.php
        return view('news', compact('berita'));
    }

    // Untuk proses simpan berita (Admin)
   public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // UBAH BARIS INI: Gunakan move() agar masuk ke folder public yang bisa diakses browser
        $file->move(public_path('storage/news'), $nama_file); 
        
        News::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => now(),
            'gambar' => 'news/' . $nama_file, // Simpan path relatifnya saja
        ]);

        return redirect()->back()->with('success', 'Berita berhasil dipublish!');
    }
}

 public function create()
    {
        // Bonus: Logika hapus otomatis berita > 7 hari (seperti kode PHP native Anda)
        News::where('tanggal', '<', Carbon::now()->subDays(7))->delete();

        return view('admin.news'); // Mengarah ke file view admin
    }

            public function show($id)
        {
            // GANTI 'Berita' menjadi 'News'
            $berita = \App\Models\News::findOrFail($id); 

            // Kirim data ke view detail
            return view('news_detail', compact('berita'));
        }
}