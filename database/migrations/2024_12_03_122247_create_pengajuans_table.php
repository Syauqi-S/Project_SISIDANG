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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mhs');
            $table->string('judul1');
            $table->string('dokumen1',255);
            $table->string('judul2')->nullable();
            $table->string('dokumen2',255)->nullable();
            $table->unsignedBigInteger('pembimbing1')->nullable();
            $table->unsignedBigInteger('pembimbing2')->nullable();
            $table->unsignedBigInteger('id_kategori');
            $table->enum('status',['0','1','2','3'])->default('0')->comment('0(mhs)=diajukan, 0(dosen/dll)=belum diperiksa');
            $table->timestamps();

            $table->foreign('id_mhs')->references('id')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('pembimbing1')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('pembimbing2')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};