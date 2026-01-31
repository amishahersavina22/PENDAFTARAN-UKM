@extends('admin.main')

@section('isi_konten')
<div class="content-box">
    <h2 style="color: #444;">Tambah Berita UKM</h2>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-container">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <label for="judul">Judul Berita:</label>
            <input type="text" name="judul" id="judul" required placeholder="Masukkan judul berita">

            <label for="isi">Isi Berita:</label>
            <textarea name="isi" id="isi" rows="6" style="width: 100%; border-radius: 8px; border: 1.5px solid #eee; padding: 10px;" required placeholder="Tuliskan berita lengkap di sini..."></textarea>

            <label for="gambar" style="margin-top: 15px;">Upload Gambar:</label>
            <input type="file" name="gambar" id="gambar" accept="image/*" required>
            <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">

            <button type="submit" class="btn-submit" style="margin-top: 20px;">
                 Simpan Berita
            </button>
        </form>
    </div>
</div>
@endsection