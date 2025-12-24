@extends('admin.main')

@section('isi_konten')
<div class="content-box">
    <h2 style="margin-bottom: 20px; color: #444;">Upload Banner & Foto Kegiatan UKM</h2>

    {{-- Pesan Sukses/Error --}}
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Pilih UKM:</label>
            <select name="ukm" required>
                <option value="">-- Pilih UKM --</option>
                @foreach($daftar_ukm as $u)
                    <option value="{{ $u }}">{{ ucfirst($u) }}</option>
                @endforeach
            </select>
        </div>

        {{-- Menggunakan class photo-grid dari CSS Anda --}}
        <div class="photo-grid">
            <div class="form-group">
                <label>Banner Utama (Ukuran Besar):</label>
                <input type="file" name="banner">
            </div>

            <div class="form-group">
                <label>Foto Kegiatan 1:</label>
                <input type="file" name="foto1">
            </div>

            <div class="form-group">
                <label>Foto Kegiatan 2:</label>
                <input type="file" name="foto2">
            </div>

            <div class="form-group">
                <label>Foto Kegiatan 3:</label>
                <input type="file" name="foto3">
            </div>
        </div>

        <button type="submit" class="btn-submit">
            🚀 UPLOAD / UPDATE DATA FOTO
        </button>
    </form>
</div>

{{-- Tabel List --}}
<div class="content-box" style="margin-top: 30px;">
    <h3>Daftar Foto Terupload</h3>
    <table>
    <thead>
        <tr>
            <th>UKM</th>
            <th>Banner</th>
            <th>Foto 1</th>
            <th>Foto 2</th> <th>Foto 3</th> <th style="text-align: center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($foto as $f)
        <tr>
            <td style="font-weight: bold;">{{ ucfirst($f->ukm) }}</td>
            
            {{-- Banner --}}
            <td>
                @if($f->banner)
                    <img src="{{ asset('galeri_ukm/' . $f->banner) }}" width="80" style="border-radius: 5px;">
                @endif
            </td>

            {{-- Foto 1 --}}
            <td>
                @if($f->foto1)
                    <img src="{{ asset('galeri_ukm/' . $f->foto1) }}" width="80" style="border-radius: 5px;">
                @endif
            </td>

            {{-- Foto 2 (Tambahkan Blok Ini) --}}
            <td>
                @if($f->foto2)
                    <img src="{{ asset('galeri_ukm/' . $f->foto2) }}" width="80" style="border-radius: 5px;">
                @else
                    <small style="color: #ccc;">Kosong</small>
                @endif
            </td>

            {{-- Foto 3 (Tambahkan Blok Ini) --}}
            <td>
                @if($f->foto3)
                    <img src="{{ asset('galeri_ukm/' . $f->foto3) }}" width="80" style="border-radius: 5px;">
                @else
                    <small style="color: #ccc;">Kosong</small>
                @endif
            </td>

            <td style="text-align: center;">
    <form action="{{ route('foto.destroy', $f->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus semua foto UKM ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" style="background: #ff5f5f; color: white; border: none; padding: 8px 15px; border-radius: 6px; cursor: pointer; font-size: 13px;">
            🗑️ Hapus
        </button>
    </form>
</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection