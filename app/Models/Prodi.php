<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'nama_prodi',
        'id_jurusan',
        'jenjang'
    ];
    protected $table = "prodi";
    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }
} 