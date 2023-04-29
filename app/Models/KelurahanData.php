<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelurahanData extends Model
{
    use HasFactory;
    protected $table='sheet1';

    public function relawansData(){
        return $this->hasMany(Relawan::class,'kelurahan_id','id');
    }

    public function datarelawans(){
        return $this->hasMany(Relawan::class);
    }
}
