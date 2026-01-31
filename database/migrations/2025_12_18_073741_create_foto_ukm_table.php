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
    Schema::create('foto_ukm', function (Blueprint $table) {
        $table->id();
        $table->string('ukm');
        $table->string('banner')->nullable(); // Ditambah nullable
        $table->string('foto1')->nullable();  // Ditambah nullable
        $table->string('foto2')->nullable();  // Ditambah nullable
        $table->string('foto3')->nullable();  // Ditambah nullable
        $table->timestamps();
    });
}
 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_ukm');
    }
};
