<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Berita UKM - Universitas Darussalam Gontor</title>
  {{-- Gunakan asset() agar CSS terpanggil dengan benar --}}
  <link rel="stylesheet" href="{{ asset('css/News.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
  <header>
    <img class="logo" src="{{ asset('images\UNIDA.png') }}" alt="Logo Unida">
    <h4> UNIVERSITAS DARUSSALAM GONTOR</h4>
    <nav>
      {{-- Update link ke route Laravel --}}
      <a href="{{ route('news') }}" class="{{ request()->routeIs('news') ? 'active' : '' }}">NEWS</a>
      <a href="{{ route('home') }}#daftar">UKM</a>
      <a href="{{ route('register') }}">REGISTER</a>
      <a href="{{ route('home') }}">HOME</a>
    </nav>
  </header>

  <div class="news-container">
    <h2>BERITA UKM UNIVERSITAS DARUSSALAM GONTOR</h2>
    <div class="news-list">
      {{-- Loop data dari Controller --}}
      @forelse ($berita as $row)
        <div class="news-card">
          {{-- Ambil gambar dari storage --}}
          <img src="{{ asset('storage/' . $row->gambar) }}" alt="{{ $row->judul }}">
          <div class="news-info">
            <h3>{{ $row->judul }}</h3>
            {{-- Format tanggal menggunakan Carbon (bawaan Laravel) --}}
            <p class="tanggal">{{ \Carbon\Carbon::parse($row->tanggal)->format('d M Y') }}</p>
            {{-- Potong teks secara rapi dengan Str::limit --}}
            <p>{{ Str::limit($row->isi, 100) }}</p>
            <a href="{{ route('news.detail', $row->id) }}" class="btn-baca">Baca Selengkapnya</a>
          </div>
        </div>
      @empty
        <p style="text-align: center; grid-column: 1/-1;">Belum ada berita untuk saat ini.</p>
      @endforelse
    </div>
  </div>

  <footer>
    <div class="footer">
      <a href="https://www.instagram.com/unida.gontor/"><i class="fa-brands fa-instagram"></i> ukm unida</a>
      <a href="#"><i class="fa-regular fa-envelope"></i> ukm unida</a>
      <a href="#"><i class="fa-brands fa-facebook"></i> ukm unida</a>
    </div>
  </footer>

</body>
</html>