<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'news';

    // Kolom mana saja yang boleh diisi secara massal
    protected $fillable = [
        'judul',
        'gambar',
        'isi',
        'tanggal'
    ];
}