<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoUkm extends Model
{
    protected $table = 'foto_ukm'; 

    // Kamu HARUS menambahkan 'ukm' dan 'kategori' (jika ada) di sini
    protected $fillable = [
        'ukm',      // Ini WAJIB ada agar nama 'basket' bisa disimpan
        'banner', 
        'foto1', 
        'foto2', 
        'foto3'
          
    ];
}