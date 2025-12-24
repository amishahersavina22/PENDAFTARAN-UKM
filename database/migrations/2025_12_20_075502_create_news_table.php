<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('judul');      // Untuk judul berita
            $table->string('gambar');     // Untuk menyimpan nama file foto
            $table->text('isi');          // Untuk isi berita yang panjang
            $table->date('tanggal');      // Untuk tanggal berita
            $table->timestamps();         // Otomatis membuat created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
