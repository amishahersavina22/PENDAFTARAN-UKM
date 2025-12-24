<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalUkm;
use App\Models\FotoUkm; 
use App\Models\Pendaftaran;


class AdminController extends Controller
{
    public function jadwal(Request $request) {
        $data = JadwalUkm::all();
        $daftar_ukm = ['basket', 'volly', 'badminton', 'aerobik', 'archery', 'tenismeja','jmq', 'jhq', 'dakwah', 'hadrah', 'khot',
                      'mc', 'racana', 'rk', 'Debat','Tari', 'band', 'tataboga', 'tatarias', 'tatabusana', 'drawing','designrafis', 'photography','hastakarya'];

        // Menangani pencarian data jika sedang mode EDIT
        $edit_data = null;
        if ($request->has('edit')) {
            $edit_data = JadwalUkm::find($request->edit);
        }

        // WAJIB mengirimkan edit_data ke view
        return view('admin.jadwal', compact('data', 'daftar_ukm', 'edit_data'));
    }

   # ----------------------------------------------------------------------------------#

    // Halaman Rekap Data Pendaftar
        public function rekap() {
        // Mengambil semua data pendaftaran
        $anggota = Pendaftaran::all(); 
        
        // Mengambil daftar UKM unik untuk dropdown
        $ukm_list = Pendaftaran::distinct()->pluck('ukm'); 
        
        return view('admin.rekap', compact('anggota', 'ukm_list'));
    }

        // Tambahkan ini di dalam AdminController

        public function destroyPendaftar($id)
        {
            // 1. Cari data pendaftar berdasarkan ID
            $pendaftar = \App\Models\Pendaftaran::findOrFail($id);
            
            // 2. Hapus data tersebut
            $pendaftar->delete();

            // 3. Kembali ke halaman rekap dengan pesan sukses
            return redirect()->back()->with('success', 'Data pendaftar berhasil dihapus');
        }
   
}
