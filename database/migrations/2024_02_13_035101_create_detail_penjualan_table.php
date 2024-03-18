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
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlahproduk');
            $table->decimal('subtotal', 10, 2);
            $table->foreignId('produkId'); 
            $table->foreignId('penjualanId');
            $table->timestamps();

            $table->foreign('penjualanId')->references('id')->on('penjualan')->onDelete('cascade');
            $table->foreign('produkId')->references('id')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan');
    }
};
