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
        Schema::create('tiket_masalah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aset');
            $table->text('keterangan');
            $table->string('before_photo');
            $table->string('after_photo')->nullable();
            $table->text('penyelesaian')->nullable();
            $table->integer('biaya_perbaikan')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('issue_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket_masalah');
    }
};
