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
        Schema::create('asset_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id');
            $table->string('photo_path'); // Or you can use 'photo_blob' for storing blob data
            $table->timestamps();

            $table->foreign('asset_id')
                ->references('id')
                ->on('assets')
                ->onDelete('cascade'); // Optional: cascade delete if asset is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_photos');
    }
};
