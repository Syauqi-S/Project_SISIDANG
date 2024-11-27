<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswa";
    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }
    public function prodi(){
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }
}