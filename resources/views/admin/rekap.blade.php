@extends('admin.main')

@section('isi_konten')
<div class="content-box">
    <h2 style="color: #444; margin-top: 0;">📊 Rekap Data Anggota UKM</h2>
    
    <div style="display: flex; gap: 10px; margin-bottom: 25px; align-items: center; background: #fafafa; padding: 15px; border-radius: 10px;">
        <div style="flex-grow: 1;">
            <label style="font-size: 12px; font-weight: bold; color: #888;">PILIH UKM</label>
            <select id="ukmSelect" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
                <option value="">-- Semua UKM --</option>
                @foreach($ukm_list as $ukm)
                    <option value="{{ $ukm }}">{{ ucfirst($ukm) }}</option>
                @endforeach
            </select>
        </div>
        
        <div style="margin-top: 20px;">
            <button id="printPDF" class="btn-action" style="background: #e74c3c; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                📄 Cetak PDF
            </button>
            <button id="printAbsen" class="btn-action" style="background: #3498db; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                📝 Cetak Absen
            </button>
        </div>
    </div>

    <div style="overflow-x: auto;">
            <table id="rekapTable">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Prodi</th> <th>Semester</th> <th>UKM</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="adminTable">
                @foreach($anggota as $a)
                <tr data-ukm="{{ $a->ukm }}">
                    <td>
                        <img src="{{ asset($a->foto) }}" alt="foto"style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 2px solid #dcabab;">
                    </td>
                    <td style="font-weight: bold;">{{ $a->nama }}</td>
                    <td>{{ $a->nim }}</td>
                    <td>{{ $a->prodi }}</td> <td>Semester {{ $a->semester }}</td> <td><span style="background: #eee; padding: 3px 8px; border-radius: 10px; font-size: 12px;">{{ strtoupper($a->ukm) }}</span></td>
                    <td>
                        <form action="{{ route('admin.destroyPendaftar', $a->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #e74c3c; cursor: pointer; font-size: 18px;">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

<script>
    // 1. Fitur Filter Sederhana
    document.getElementById('ukmSelect').addEventListener('change', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#adminTable tr');
        
        rows.forEach(row => {
            let ukm = row.getAttribute('data-ukm').toLowerCase();
            row.style.display = (filter === "" || ukm === filter) ? "" : "none";
        });
    });

    // 2. Fungsi Helper - DISESUAIKAN INDEXNYA
    function getFilteredData() {
        const rows = document.querySelectorAll('#adminTable tr');
        const data = [];
        rows.forEach(row => {
            if (row.style.display !== 'none') {
                const cols = row.querySelectorAll('td');
                // Kita ambil data satu-satu sesuai urutan kolom tabel
                data.push([
                    cols[1].innerText, // Index 1: Nama
                    cols[2].innerText, // Index 2: NIM
                    cols[3].innerText, // Index 3: Prodi
                    cols[4].innerText, // Index 4: Semester
                    cols[5].innerText  // Index 5: UKM
                ]);
            }
        });
        return data;
    }

    // 3. Fitur Cetak PDF (Rekap Lengkap)
    document.getElementById("printPDF").addEventListener("click", function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        const ukm = document.getElementById('ukmSelect').value || "SEMUA";
        
        doc.text(`REKAP DATA ANGGOTA UKM - ${ukm.toUpperCase()}`, 14, 15);
        
        doc.autoTable({
            startY: 20,
            // Header harus ada 5 sesuai dengan jumlah data di getFilteredData
            head: [['Nama', 'NIM', 'Prodi', 'Semester', 'UKM']], 
            body: getFilteredData(),
            theme: 'grid',
            headStyles: { fillColor: [52, 152, 219] }, // Memberi warna biru agar rapi
        });
        
        doc.save(`Rekap_UKM_${ukm}.pdf`);
    });

    // 4. Fitur Cetak Absen
    document.getElementById("printAbsen").addEventListener("click", function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        const ukm = document.getElementById('ukmSelect').value || "SEMUA";
        
        doc.text(`DAFTAR ABSENSI UKM - ${ukm.toUpperCase()}`, 14, 15);
        
        const rows = document.querySelectorAll('#adminTable tr');
        const dataAbsen = [];
        let no = 1;
        rows.forEach(row => {
            if (row.style.display !== 'none') {
                const cols = row.querySelectorAll('td');
                dataAbsen.push([
                    no++, 
                    cols[1].innerText, // Nama
                    cols[2].innerText, // NIM
                    "..........................." // Kolom Tanda Tangan
                ]);
            }
        });

        doc.autoTable({
            startY: 20,
            head: [['No', 'Nama Anggota', 'NIM', 'Tanda Tangan']],
            body: dataAbsen,
            styles: { rowHeight: 12 }, 
        });
        
        doc.save(`Absensi_UKM_${ukm}.pdf`);
    });
</script>
@endsection