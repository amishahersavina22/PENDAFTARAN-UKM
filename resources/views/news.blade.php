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
      <a href="{{ route('pendaftaran.form') }}">REGISTER</a>
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
    <div class="footer-container">
        <div class="footer-section">
            <img src="{{ asset('images/UNIDA.png') }}" alt="Logo UNIDA" class="footer-logo">
            <p>Unit Kegiatan Mahasiswa (UKM)<br>Universitas Darussalam Gontor Kampus Putri.</p>
            <p>Membentuk mahasiswi yang berfikir kreatif, berbadan sehat, berperasaan halus, dan berjiwa tauhid.</p>
        </div>

        <div class="footer-section">
            <h4>Navigasi</h4>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('pendaftaran.form') }}">Pendaftaran</a></li>
                <li><a href="{{ route('news') }}">Berita UKM</a></li>
                <li><a href="#">Tentang Kami</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Kategori UKM</h4>
            <ul>
                <li><a href="{{ route('kategori.fikir') }}">Olah Fikir</a></li>
                <li><a href="{{ route('kategori.raga') }}">Olah Raga</a></li>
                <li><a href="{{ route('kategori.rasa') }}">Olah Rasa</a></li>
                <li><a href="{{ route('kategori.dzikir') }}">Olah Dzikir</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Hubungi Kami</h4>
            <div class="social-links">
                <a href="https://www.instagram.com/unida.gontor/"><i class="fa-brands fa-instagram"></i> @unida.gontor</a>
                <a href="https://www.youtube.com/unidagontor"><i class="fa-brands fa-youtube"></i> UNIDA Gontor TV</a>
                <a href="https://unida.gontor.ac.id"><i class="fa-solid fa-globe"></i> unida.gontor.ac.id</a>
            </div>
            <p class="address"><i class="fa-solid fa-location-dot"></i> Mantingan, Ngawi, Jawa Timur</p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} Universitas Darussalam Gontor. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>
