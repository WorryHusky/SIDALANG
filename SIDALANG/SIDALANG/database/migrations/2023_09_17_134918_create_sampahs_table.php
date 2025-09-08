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
        Schema::create('sampahs', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('nm_sampah');
            $table->string('kategori');
            $table->string('deskripsi');
            $table->string('point');
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('jenis_id');
            $table->foreign('jenis_id')->references('id')->on('jenis_sampahs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampahs');
    }
};
