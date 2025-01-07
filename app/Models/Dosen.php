<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    public function jurusan(){
        return $this->belongsTo(Jurusan::class,'id_jurusan','id');
    }

    public function prodi(){
        return $this->belongsTo(Prodi::class,'id_prodi','id');
    }

    public function kategori(){
        return $this->belongsToMany( Kategori::class, 'dosen_kategori',foreignPivotKey: 'id_dosen',relatedPivotKey: 'id_kategori');
    }
}