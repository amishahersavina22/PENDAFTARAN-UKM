<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalUkm; 
use Illuminate\Support\Facades\Storage;

class JadwalUkmController extends Controller
{
   

   // Di JadwalUkmController (Admin)
public function store(Request $request)
    {
        $data = $request->validate([
            'ukm' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'tempat' => 'required',
            'keterangan' => 'nullable',
        ]);

        // Jika ada ID, update. Jika tidak, buat baru (konsep Edit/Tambah)
        if ($request->id) {
            \App\Models\JadwalUkm::find($request->id)->update($data);
        } else {
            \App\Models\JadwalUkm::create($data);
        }

        return redirect()->back()->with('success', 'Jadwal berhasil diperbarui');
}

        public function index(Request $request)
    {
        $data = JadwalUkm::all();
        // Inisialisasi daftar UKM secara manual jika tidak ada tabel 'ukms'
        $daftar_ukm = ['basket', 'volly', 'badminton', 'pencak-silat']; 
        
        $edit_data = null;
        if ($request->has('edit')) {
            $edit_data = JadwalUkm::find($request->edit);
        }

        return view('admin.jadwal', compact('data', 'daftar_ukm', 'edit_data'));
    }

      public function destroy($id)
{
    // Cari data berdasarkan ID
    $jadwal = \App\Models\JadwalUkm::findOrFail($id);
    
    // Hapus data
    $jadwal->delete();

    // Kembalikan ke halaman sebelumnya dengan pesan sukses
    return redirect()->back()->with('success', 'Jadwal berhasil dihapus');
}
}