<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('layanans', function (Blueprint $table) {
        $table->id('id_layanan');
        $table->string('nama_layanan', 100);
        $table->decimal('harga', 15, 2)->check('harga > 0');
        $table->text('deskripsi');
        $table->integer('waktu_proses');
        $table->boolean('status_layanan');
        $table->foreignId('id_kategori')->constrained('kategoris');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};