<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = "pengajuan";

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class,'id_mhs','id');
    }

    public function pembimbing_1(){
        return $this->belongsTo(Dosen::class, 'pembimbing1', 'id');
    }
    public function pembimbing_2(){
        return $this->belongsTo(Dosen::class, 'pembimbing2','id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori','id');
    }
}