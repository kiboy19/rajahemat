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
    Schema::create('log_layanans', function (Blueprint $table) {
        $table->id('id_log');
        $table->foreignId('id_layanan')->constrained('layanans');
        $table->boolean('status_layanan');
        $table->timestamp('timestamp')->useCurrent(); // Menggunakan useCurrent()
        $table->foreignId('id_admin')->constrained('admins');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_layanans');
    }
};