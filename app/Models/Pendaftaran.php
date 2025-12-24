<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'daftar_anggota';

protected $fillable = [
    'nama', 'nim', 'prodi', 'semester', 'ukm', 'foto'
];

}

