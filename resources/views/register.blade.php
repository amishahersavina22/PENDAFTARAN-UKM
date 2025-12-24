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
    <a href="{{ route('register') }}">REGISTER</a>
    <a href="{{ route('home') }}">HOME</a>
    </nav>
</header>

<body>
    <div class="container">
       <form action="{{ route('pendaftaran.store') }}" 
      method="POST" 
      enctype="multipart/form-data">

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
        <div class="footer">
            <a href="https://www.instagram.com/unida.gontor/"><i class="fa-brands fa-instagram"></i>ukm unida dddd</a>
            <a href=""><i class="fa-regular fa-envelope"></i>ukm unidaddddd</a>
            <a href=""><i class="fa-brands fa-facebook"></i>ukm unidadddddddd</a>
        </div>
    </footer>
</body>
</html>