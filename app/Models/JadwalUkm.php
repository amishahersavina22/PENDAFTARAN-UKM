<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalUkm extends Model
{
    protected $table = 'jadwal_ukm'; 

    protected $fillable = [
    'ukm', 'hari', 'jam', 'tempat', 'keterangan'
];
}
