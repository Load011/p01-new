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
        Schema::create('rekap_aset', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('host_id')->nullable();
            $table->string('wilayah');
            $table->text('deskripsi_aset')->nullable();
            $table->string('nama_aset');
            $table->string('jenis_aset');
            $table->string('kode_aset');
            $table->string('alamat');
            $table->decimal('pengeluaran',10,0)->nullable();
            $table->unsignedBigInteger('id_transaksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_aset');
    }
};
