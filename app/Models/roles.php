<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionContextPass;

class roles extends Model
{   
    // menonaktifkan update_at pada database bawaan default
    public $timestamps = false; 
    use HasFactory;
    
    public function getCount(){
        return $this->account()->count();
    }

    public function account(){
        return $this->hasMany(User::class,"id_role","id");
    }

}

//add event listener onchange