<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>UKM {{ strtoupper($ukm) }}</title>
  <link rel="stylesheet" href="{{ asset('css/olahukm.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>
    <header>
        <div class="header-left">
            <img class="logo" src="{{ asset('images/UNIDA.png') }}">
            <h4>UNIVERSITAS DARUSSALAM GONTOR</h4>
        </div>
        <nav>
            <a href="{{ route('news') }}">NEWS</a>
            <a href="{{ route('home') }}#daftar">UKM</a>
            <a href="{{ route('pendaftaran.form') }}">REGISTER</a>
            <a href="{{ route('home') }}">HOME</a>
        </nav>
    </header>

    <main class="content-wrapper">
        {{-- BANNER --}}
        <div class="banner">
            @if($banner && $banner->banner)
                <img src="{{ asset('galeri_ukm/'.$banner->banner) }}">
            @endif
        </div>

        {{-- FOTO KEGIATAN --}}
        <div class="kegiatan">
            @if($banner)
                @for($i=1; $i<=3; $i++)
                    @php $kolom = 'foto'.$i; @endphp
                    @if($banner->$kolom)
                        <img src="{{ asset('galeri_ukm/'.$banner->$kolom) }}">
                    @endif
                @endfor
            @endif
        </div>

        {{-- JADWAL --}}
        <section class="schedule-section">
            <h2>Jadwal Kegiatan</h2>
            <table class="tabel-jadwal">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Tempat</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwal as $j)
                    <tr>
                        <td>{{ $j->hari }}</td>
                        <td>{{ $j->jam }}</td>
                        <td>{{ $j->tempat }}</td>
                        <td>{{ $j->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        {{-- ANGGOTA --}}
        <section class="members-section">
            <h2>ANGGOTA UKM {{ strtoupper($ukm) }}</h2>
            <div class="member-card">
                @forelse($anggota as $a)
                    <div class="anggota">
                        <img src="{{ asset($a->foto) }}">
                        <p>{{ $a->nama }}</p>
                    </div>
                @empty
                    <p>Belum ada pendaftar</p>
                @endforelse
            </div>
        </section>
    </main>

    <footer>
        <div class="footer">
        <a href="https://www.instagram.com/unida.gontor/"><i class="fa-brands fa-instagram"></i>unida gontor.id</a>
        <a href="https://www.youtube.com/results?search_query=unida+gontor"><i class="fa-brands fa-youtube"></i>unidagontor</a>
        <a href="https://www.facebook.com/profile.php?id=100067191552530&locale=id_ID"><i class="fa-brands fa-facebook"></i>unidagontor</a>
        </div>
    </footer>
</body>
</html>
