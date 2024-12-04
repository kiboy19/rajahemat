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
    Schema::create('log_saldo', function (Blueprint $table) {
        $table->id('id_log');
        $table->foreignId('id_saldo')->constrained('saldo');
        $table->decimal('jumlah_perubahan', 15, 2);
        $table->enum('tipe_perubahan', ['deposit', 'withdrawal', 'adjustment']);
        $table->timestamp('tanggal_perubahan')->useCurrent(); // Menggunakan useCurrent()
        $table->foreignId('id_admin')->constrained('admins');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_saldo');
    }
};