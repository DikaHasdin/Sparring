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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pemesanan');
            $table->time('jam_mulai');
            $table->integer('jumlah_jam');
            $table->string('keterangan');
            $table->string('status_pemesanan');
            $table->integer('ruangan_id');
            $table->integer('paket_id');
            $table->integer('pelanggan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
