@extends('admin.main')

@section('isi_konten') {{-- DISESUAIKAN DENGAN @yield DI admin/main --}}
    <h2>Kelola Jadwal Semua UKM</h2>
<style>
    
</style>

    {{-- Form Tambah/Edit --}}
    <div style="background: #fff5f5; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
        <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $edit_data->id ?? '' }}">
            
            <label>Pilih UKM:</label>
            <select name="ukm" required>
                <option value="">-- Pilih UKM --</option>
                @foreach($daftar_ukm as $ukm)
                    <option value="{{ $ukm }}" {{ (isset($edit_data) && $edit_data->ukm == $ukm) ? 'selected' : '' }}>
                        {{ ucfirst($ukm) }}
                    </option>
                @endforeach
            </select>
            
            <input type="text" name="hari" placeholder="Hari" value="{{ $edit_data->hari ?? '' }}" required>
            <input type="text" name="jam" placeholder="Jam (Contoh: 13:00 - 15:00)" value="{{ $edit_data->jam ?? '' }}" required>
            <input type="text" name="tempat" placeholder="Tempat" value="{{ $edit_data->tempat ?? '' }}" required>
            <input type="text" name="keterangan" placeholder="Keterangan (Opsional)" value="{{ $edit_data->keterangan ?? '' }}">

            <button type="submit">{{ isset($edit_data) ? 'Update Jadwal' : 'Tambah Jadwal' }}</button>
            
            @if(isset($edit_data))
                <a href="{{ route('admin.jadwal') }}" style="text-decoration:none;"><button type="button" style="background:grey;">Batal</button></a>
            @endif
        </form>
    </div>

    {{-- Tabel Data --}}
    <table>
        <thead>
            <tr>
                <th>UKM</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Tempat</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ ucfirst($d->ukm) }}</td>
                <td>{{ $d->hari }}</td>
                <td>{{ $d->jam }}</td>
                <td>{{ $d->tempat }}</td>
                <td>{{ $d->keterangan }}</td>
                <td>
                    <a href="{{ route('admin.jadwal', ['edit' => $d->id]) }}" style="color: blue;">Edit</a> | 
                    <form action="{{ route('jadwal.destroy', $d->id) }}" method="POST" style="display:inline">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" style="background:none; color:red; border:none; padding:0; cursor:pointer;" onclick="return confirm('Hapus jadwal ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection