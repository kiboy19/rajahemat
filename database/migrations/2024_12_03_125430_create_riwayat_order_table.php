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
    Schema::create('riwayat_order', function (Blueprint $table) {
        $table->id('id_riwayat');
        $table->foreignId('id_order')->constrained('order');
        $table->foreignId('id_status')->constrained('status_order');
        $table->timestamp('timestamp')->useCurrent(); // Menggunakan useCurrent()
        $table->foreignId('changed_by')->constrained('admins');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_order');
    }
};