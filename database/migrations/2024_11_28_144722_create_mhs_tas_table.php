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
        Schema::create('mhs_ta', function (Blueprint $table) {
            $table->id();
            $table->string("judul");
            $table->unsignedBigInteger("id_mhs");
            $table->unsignedBigInteger("pembimbing1");
            $table->unsignedBigInteger("pembimbing2");
            $table->unsignedBigInteger("id_kategori");
            $table->enum('status',['0','1','2','3'])->default('0')->comment('0(mhs)=dalam pengajuan, 0(dosen/dll)=belum diperiksa');

            $table->timestamps();

            $table->foreign("id_mhs")->references("id")->on("mahasiswa")->onDelete("cascade");
            $table->foreign("id_kategori")->references("id")->on("kategoris")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mhs_ta');
    }
};