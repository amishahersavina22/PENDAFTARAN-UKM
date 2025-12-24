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
    body {
    background-image: url('../bg.jpg');
    background-repeat: no-repeat;
    background-position-y: -15%;
    margin: 0;
    top: 0;
    left: 0;
    z-index: 1;
    overflow-x: hidden;

}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 110%;
     z-index: -2;
    background-color: rgba(255, 242, 242, 0.703);
}
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
            <img class="logoukm" src="{{ asset('images/fikir.jpg') }}" alt="Logo Raga">
            <h4>
                <span class="span-deskripsi">
                    UKM OLAH FIKIR <br>
                    UKM Olahraga adalah wadah bagi mahasiswa untuk menyalurkan minat dan bakat di bidang olahraga 
                    serta menjaga kebugaran jasmani melalui berbagai kegiatan dan kompetisi.
                </span>
            </h4>
        </div>

        <div class="daftar">
            <a href="{{ route('ukm.show', 'racana') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image:  url('../images/racana.jpg');"></button>
                <p>RACANA</p>
            </a>

            <a href="{{ route('ukm.show', 'rk') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image:  url('../images/rk.png');"></button>
                <p>RK</p>
            </a>

            <a href="{{ route('ukm.show', 'debat') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image:  url('../images/debat.jpg');"></button>
                <p>DEBAT</p>
            </a>

            <a href="{{ route('ukm.show', 'mc') }}" class="item-ukm">
                <button class="btn-ukm" style="background-image:  url('../images/mc.jpg');"></button>
                <p>MC</p>
            </a>
        </div>
    </div>

    <footer>
        <div class="footer">
            <a href="https://www.instagram.com/unida.gontor/"><i class="fa-brands fa-instagram"></i>sasa</a>
            <a href="#"><i class="fa-regular fa-envelope"></i>sasa</a>
            <a href="#"><i class="fa-brands fa-facebook"></i>sasa</a>
        </div>
    </footer>
</body>
</html>