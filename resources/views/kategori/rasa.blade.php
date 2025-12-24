<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM Olahraga</title>
    <link rel="stylesheet" href="{{ asset('css/raga.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
            <a href="{{ url('/register') }}">REGISTER</a>
            <a href="{{ url('/') }}">HOME</a>
        </nav>
    </header>

    <div class="container">
        <div class="content">
            <img class="logoukm" src="{{ asset('images/seni.png') }}" alt="Logo Raga">
            <h4>
                <span class="span-deskripsi">
                    UKM OLAH RAGA <br>
                    UKM Olahraga adalah wadah bagi mahasiswa untuk menyalurkan minat dan bakat di bidang olahraga 
                    serta menjaga kebugaran jasmani melalui berbagai kegiatan dan kompetisi.
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
        <div class="footer">
            <a href="https://www.instagram.com/unida.gontor/"><i class="fa-brands fa-instagram"></i>Instagram</a>
            <a href="#"><i class="fa-regular fa-envelope"></i>Facebook</a>
            <a href="#"><i class="fa-brands fa-facebook"></i>Youtube</a>
        </div>
    </footer>
</body>
</html>