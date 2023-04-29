<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'nama',
        'team',
    ];

    protected $dates = ['created_ad'];

    public function kecamatans(){
        return $this->hasMany(Koord_kecamatan::class,'team_id','id');
    }

    public function datarelawan(){
        return $this->hasManyThrough(Relawan::class, Koord_desa::class,Koord_kecamatan::class);
    }
}
