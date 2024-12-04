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
    Schema::create('transaksi_layanan', function (Blueprint $table) {
        $table->id('id_transaksi');
        $table->foreignId('id_layanan')->constrained('layanan');
        $table->foreignId('id_saldo')->constrained('saldos');
        $table->decimal('jumlah', 15, 2);
        $table->timestamp('timestamp')->useCurrent(); // Menggunakan useCurrent()
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_layanan');
    }
};