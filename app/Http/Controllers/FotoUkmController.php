<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalUkm;
use App\Models\FotoUkm; // Pastikan ini di-import

class FotoUkmController extends Controller
{
    public function create()
    {
        // Daftar UKM manual agar tidak tergantung tabel jadwal yang kosong
        $daftar_ukm = [
            'basket', 'volly', 'badminton', 'aerobik', 'archery', 'tenismeja', 'jmq', 'jhq', 'dakwah', 'hadrah', 'khot',
            'mc', 'racana', 'rk', 'Debat', 'Tari', 'band', 'tataboga', 'tatarias', 'tatabusana', 'drawing', 'designrafis', 'photography', 'hastakarya'
        ];

        // Mengambil semua data dari tabel FotoUkm untuk ditampilkan di tabel bawah
        $foto = FotoUkm::all();

        return view('admin.foto', compact('daftar_ukm', 'foto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ukm'    => 'required',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto1'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto2'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Mencari data lama atau buat baru berdasarkan nama UKM
        $fotoUkm = FotoUkm::firstOrNew(['ukm' => $request->ukm]);

        $kolom_foto = ['banner', 'foto1', 'foto2', 'foto3'];

        foreach ($kolom_foto as $kolom) {
            if ($request->hasFile($kolom)) {
                // Hapus file fisik lama jika ada agar tidak jadi sampah di server
                if ($fotoUkm->$kolom && file_exists(public_path('galeri_ukm/' . $fotoUkm->$kolom))) {
                    unlink(public_path('galeri_ukm/' . $fotoUkm->$kolom));
                }

                $file = $request->file($kolom);
                $nama_file = $kolom . '_' . time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('galeri_ukm'), $nama_file);
                
                $fotoUkm->$kolom = $nama_file;
            }
        }

        $fotoUkm->save();
        return redirect()->back()->with('success', 'Data Foto UKM ' . ucfirst($request->ukm) . ' berhasil disimpan!');
    }

    public function destroy($id)
    {
        $foto = FotoUkm::findOrFail($id);

        $kolom_foto = ['banner', 'foto1', 'foto2', 'foto3'];

        foreach ($kolom_foto as $kolom) {
            if ($foto->$kolom && file_exists(public_path('galeri_ukm/' . $foto->$kolom))) {
                unlink(public_path('galeri_ukm/' . $foto->$kolom));
            }
        }

        $foto->delete();
        return redirect()->back()->with('success', 'Data foto UKM berhasil dihapus!');
    }
}