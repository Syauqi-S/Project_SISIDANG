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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nidn',20)->unique();
            $table->string('nip',25)->unique();
            $table->string('nama',50);
            $table->unsignedBigInteger('id_jurusan');
            $table->unsignedBigInteger('id_prodi');
            $table->unsignedBigInteger('id_kategori');
            $table->timestamps();

            $table->foreign('id_jurusan')->references('id')->on('jurusan')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id')->on('prodi')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};