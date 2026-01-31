<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/formpendaftaran.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Document</title>
</head>
<header>
    <img class="logo" src="{{ asset('images/UNIDA.png') }}" alt="">
    <h4> UNIVERSITAS DARUSSALAM GONTOR</h4>
    <nav>
    <a href="{{ route('news') }}">NEWS</a>
    <a href="{{ route('home') }}#daftar">UKM</a>
    <a href="{{ route('pendaftaran.form') }}">REGISTER</a>
    <a href="{{ route('home') }}">HOME</a>
    </nav>
</header>

<body>
    <div class="container">
<form method="POST" action="{{ route('pendaftaran.store') }}" enctype="multipart/form-data">
    @csrf
            <h2>FORM PENDAFTARAN UKM</h2>

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required>
            </div>

            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>
            </div>

            <div class="form-group">
                <label for="prodi">Prodi/Jurusan:</label>
                <input type="text" id="prodi" name="prodi" placeholder="Masukkan Prodi" required>
            </div>

            <div class="form-group">
                <label for="semester">Semester:</label>
                <input type="text" id="semester" name="semester" placeholder="Masukkan Semester" required>
            </div>

            <div class="form-group">
                <label for="file">Foto:</label>
                <input type="file" id="file" name="file" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="ukm">Pilih UKM:</label>
                <select name="ukm" id="ukm" required>
                    <option value="">--Pilih UKM--</option>
                    <option value="basket">Basket</option>
                    <option value="volly">Volly</option>
                    <option value="tenismeja">Tenis Meja</option>
                    <option value="badminton">Badminton</option>
                    <option value="aerobik">Aerobik</option>
                    <option value="archery">Archery</option>
                    <option value="band">Band</option>
                    <option value="tatarias">Tata Rias</option>
                    <option value="tatabusana">Tata Busana</option>
                    <option value="tataboga">Tata Boga</option>
                    <option value="khot">Khot</option>
                    <option value="drawing">Drawing</option>
                    <option value="hastakarya">Hasta Karya</option>
                    <option value="tari">Tari</option>
                    <option value="designgrafis">Design Grafis</option>
                    <option value="photografis">Photografis</option>
                    <option value="videografis">Videographis</option>
                    <option value="debat">Debat</option>
                    <option value="jurnalistik">Jurnalistik</option>
                    <option value="racana">Racana</option>
                    <option value="mc">MC</option>
                    <option value="rk">RK</option>
                    <option value="jmq">JMQ</option>
                    <option value="jhq">JHQ</option>
                    <option value="hadrah">Hadrah</option>
                    <option value="dakwah">Dakwah</option>
                </select>
            </div>

            <button type="submit">SUBMIT</button>
        </form>
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
