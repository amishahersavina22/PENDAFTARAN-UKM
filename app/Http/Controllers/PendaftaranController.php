<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran; 

class PendaftaranController extends Controller
{
    public function store(Request $request)
{
    $data = $request->validate([
        'nama'     => 'required|string',
        'nim'      => 'required|string',
        'prodi'    => 'required|string',
        'semester' => 'required|string',
        'ukm'      => 'required|string',
        'file'     => 'required|image|mimes:jpg,png,jpeg|max:2048'
    ]);

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        // Membuat nama file unik
        $nama_file = time() . "_" . $file->getClientOriginalName();
        // Simpan ke: public/foto_pendaftar
        $file->move(public_path('foto_pendaftar'), $nama_file);
        
        // Simpan path yang benar ke database
        $data['foto'] = 'foto_pendaftar/' . $nama_file;
    }

    Pendaftaran::create($data);

    return redirect()->route('home')->with('success', 'Pendaftaran berhasil!');
}
}
