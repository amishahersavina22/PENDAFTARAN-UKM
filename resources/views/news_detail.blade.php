<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $berita->judul }} - Detail Berita</title>
    <link rel="stylesheet" href="{{ asset('css/News.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        .container-detail { width: 80%; margin: 10px auto; line-height: 1.6; }
        .img-detail { width: 50%; max-height: 230px; object-fit: cover; border-radius: 8px; }
        .content { margin-top: 10px; white-space: pre-line; } /* Menjaga spasi paragraf */
    </style>
</head>
<body>
    <header>
        <img class="logo" src="{{ asset('images/UNIDA.png') }}" alt="Logo Unida">
        <h4>UNIVERSITAS DARUSSALAM GONTOR</h4>
        <nav>
            <a href="{{ route('news') }}">NEWS</a>
            <a href="{{ route('home') }}#daftar">UKM</a>
            <a href="{{ route('pendaftaran.form') }}">REGISTER</a>
            <a href="{{ route('home') }}">HOME</a>
        </nav>
    </header>

    <div class="container-detail">
        <a href="{{ route('news') }}" style="text-decoration: none; color: #777;"><i class="fa fa-arrow-left"></i> Kembali ke Berita</a>

        <h1>{{ $berita->judul }}</h1>
        <p class="tanggal">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}</p>

        <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-detail" alt="{{ $berita->judul }}">

        <div class="content">
            {!! nl2br(e($berita->isi)) !!}
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
