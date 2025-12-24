<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin UKM</title>
 <style>
    body { margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; display: flex; background-color: #f4f7f6; }
    .sidebar { width: 240px; background-color: #dcabab; color: white; position: fixed; height: 100%; box-shadow: 2px 0 5px rgba(0,0,0,0.1); }
    .sidebar a { color: white; text-decoration: none; padding: 15px 20px; display: block; transition: 0.3s; border-bottom: 1px solid rgba(255,255,255,0.1); }
    .sidebar a:hover { background-color: #e09797ff; }
    
    .main-content { margin-left: 240px; padding: 40px; flex-grow: 1; min-height: 100vh; }
    
    /* Box Putih Utama */
    .content-box { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }

    /* Form Styling */
    .form-group { margin-bottom: 20px; text-align: left; }
    label { font-weight: 600; color: #555; display: block; margin-bottom: 8px; font-size: 14px; }
    
    input[type="text"], input[type="file"], select {
        width: 100%; padding: 12px ; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; background: #fafafa; margin-bottom: 10px;
    }

    /* Grid untuk Upload Foto agar tidak panjang ke bawah */
    .photo-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-top: 20px; }

    .btn-submit { 
        width: 100%; background: #dcabab; color: white; padding: 15px; border: none; 
        border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 16px; margin-top: 20px;
    }
    .btn-submit:hover { background: #c99393; }

    /* Tabel Styling */
    table { width: 100%; border-collapse: collapse; margin-top: 30px; background: white; }
    th { background: #dcabab; color: white; padding: 15px; text-align: left; }
    td { padding: 15px; border-bottom: 1px solid #eee; }
</style>
</head>
<body>
  <div class="sidebar">
    <h2 style="text-align:center">ADMIN</h2>
    <a href="{{ route('admin.jadwal') }}">Kelola Jadwal</a>
    <a href="{{ route('admin.news') }}">Input News</a>
    <a href="{{ route('admin.rekap') }}">Rekap Data</a>
    <a href="{{ route('foto.create') }}">Upload Foto</a>
  </div>

  <div class="main-content">
    <div class="content-box">
      @yield('isi_konten')
    </div>
  </div>
</body>
</html>