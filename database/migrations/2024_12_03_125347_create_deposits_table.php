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
    Schema::create('deposits', function (Blueprint $table) {
        $table->id('id_deposit');
        $table->decimal('jumlah_deposit', 15, 2);
        $table->timestamp('tanggal_deposit');
        $table->string('waktu_deposit');
        $table->enum('status_deposit', ['pending', 'success', 'failed']);
        $table->foreignId('id_saldo')->constrained('saldos');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};