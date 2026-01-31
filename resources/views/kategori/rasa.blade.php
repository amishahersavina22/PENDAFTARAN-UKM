<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM Olahraga</title>
    <link rel="stylesheet" href="{{ asset('css/ukm.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<style>

</style>
<body>
    <header>
        <img class="logo" src="{{ asset('images/UNIDA.png') }}" alt="Logo UNIDA">
        <h4> UNIVERSITAS DARUSSALAM GONTOR</h4>
        <nav>
            <a href="{{ url('/news') }}">NEWS</a>
            <a href="{{ route('home') }}#daftar">UKM</a>
            <a href="{{ url('/pendaftaran.form') }}">REGISTER</a>
            <a href="{{ url('/') }}">HOME</a>
        </nav>
    </header>

    <div class="container">
      <div class="content">
    <img class="logoukm" src="{{ asset('images/raga.jpg') }}" alt="Logo Raga">
    <h4>
        <span class="span-deskripsi">
    <b>UKM OLAH RASA</b>
    Wadah bagi mahasiswa untuk mengekspresikan kreativitas, memperhalus budi pekerti, dan mengembangkan bakat di bidang seni serta budaya demi mewujudkan pribadi yang estetis dan beretika.
       </span>
    </h4>
</div>

        <div class="daftar">
            <a href="{{ route('ukm.show', 'drawing') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image:  url('../images/drawing.png');"></button>
                <p>DRAWING</p>
            </a>

            <a href="{{ route('ukm.show', 'photography') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image:  url('../images/fotography.jpg');"></button>
                <p>PHOTOGRAPHY</p>
            </a>

            <a href="{{ route('ukm.show', 'desaingrafis') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image:  url('../images/desaingrafis.png');"></button>
                <p>DESIGNGRAFIS</p>
            </a>

            <a href="{{ route('ukm.show', 'tataboga') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image:  url('../images/tata boga.jpg');"></button>
                <p>TATABOGA</p>
            </a>

            <a href="{{ route('ukm.show', 'tatarias') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image:  url('../images/tta rias.jpg');"></button>
                <p>TATARIAS</p>
            </a>

            <a href="{{ route('ukm.show', 'tatabusana') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image: url('../images/tata busana.png');"></button>
                <p>TATABUSANA</p>
            </a>
            <a href="{{ route('ukm.show', 'tari') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image: url('../images/tari.png');"></button>
                <p>TARI</p>
            </a>
            <a href="{{ route('ukm.show', 'band') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image:  url('../images/band.png');"></button>
                <p>BAND</p>
            </a>
            <a href="{{ route('ukm.show', 'hastakarya') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image: url('../images/hasta.png');"></button>
                <p>HASTAKARYA</p>
            </a>
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
