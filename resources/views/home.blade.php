<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Home</title>
</head>
<header>
    <img class="logo" src="{{ asset('images/UNIDA.png') }}" alt="">
    <h4> UNIVERSITAS DARUSSALAM GONTOR</h4>
    <nav>
    <a href="{{ route('news') }}">NEWS</a>
    <a href="{{ route('home') }}#daftar">UKM</a>
    <a href="{{ route('register') }}">REGISTER</a>
    <a href="{{ route('home') }}">HOME</a>
  
    </nav>
</header>

<body>
    <div class="container">
        <img class="logo1" src="{{ asset('images/logo.jpg') }}" alt="">
        <h2>UNIT KEGIATAN MAHASISWA</h2>
        <h2>UNIVERSITAS DARUSSALAM GONTOR KAMPUS PUTRI</h2>
        <div class="content">
            <h4>TERDAPAT BERBAGAI KEGIATAN YANG DAPAT KAMU IKUTI</h4>
        </div>
        <div class="daftar" id="daftar">
    <div class="ukm-card">
        <a href="{{ route('kategori/fikir') }}">
            <button class="daftarcontent" style="background-image: url('images/fikir.jpg');"></button>
        </a>
        <h5>OLAH FIKIR</h5>
        <p class="jumlah-pendaftar">{{ $countFikir }} Pendaftar</p>
    </div>

    <div class="ukm-card">
        <a href="{{ route('kategori/raga') }}">
            <button class="daftarcontent" style="background-image: url('images/raga.jpg');"></button>
        </a>
        <h5>OLAH RAGA</h5>
        <p class="jumlah-pendaftar">{{ $countRaga }} Pendaftar</p> </div>

    <div class="ukm-card">
        <a href="{{ route('kategori/rasa') }}">
            <button class="daftarcontent" style="background-image: url('images/seni.png');"></button>
        </a>
        <h5>OLAH RASA</h5>
        <p class="jumlah-pendaftar">{{ $countRasa }} Pendaftar</p> </div>

    <div class="ukm-card">
        <a href="{{ route('kategori/dzikir') }}">
            <button class="daftarcontent" style="background-image: url('images/dzikir.jpg');"></button>
        </a>
        <h5>OLAH DZIKIR</h5>
        <p class="jumlah-pendaftar">{{ $countDzikir }} Pendaftar</p> </div>
</div>
    </div>
</body>
<footer>
    <div class="footer">
        <a href="https://www.instagram.com/unida.gontor/"><i class="fa-brands fa-instagram"></i>unida gontor.id</a>
        <a href=""><i class="fa-regular fa-envelope"></i>unida gontor.id</a>
        <a href=""><i class="fa-brands fa-facebook"></i>unida gontor.id</a>
    </div>
</footer>

</html>