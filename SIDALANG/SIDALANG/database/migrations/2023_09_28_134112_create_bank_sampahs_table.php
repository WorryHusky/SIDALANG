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
        Schema::create('bank_sampahs', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('nm_banks');
            $table->text('detail_lokasi');
            $table->unsignedBigInteger('provinsi_id');
            $table->foreign('provinsi_id')->references('id')->on('provinsis')->onDelete('cascade');
            $table->unsignedBigInteger('kota_id');
            $table->foreign('kota_id')->references('id')->on('kotas')->onDelete('cascade');
            $table->unsignedBigInteger('kecamatan_id');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_sampahs');
    }
};
