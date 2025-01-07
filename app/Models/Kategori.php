<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'id_jurusan'
    ];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class,'id_jurusan','id');
    }

    public function dosen(){
        return $this->belongsToMany(Dosen::class,'dosen_kategori','id_kategori','id_dosen');
    }

}