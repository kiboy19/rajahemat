<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Referensi ke tabel users
            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // Referensi ke tabel services
            $table->string('link'); // Link akun yang akan dipesan
            $table->integer('quantity'); // Jumlah pemesanan
            $table->decimal('price', 10, 2); // Harga per unit layanan
            $table->decimal('total', 10, 2); // Total harga (quantity * price)
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
