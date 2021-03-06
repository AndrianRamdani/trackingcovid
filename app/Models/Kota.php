<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Kota extends Model
{
    use HasFactory;

    protected $table = "kotas";
    protected $fillable = [
        'id_provinsi',
        'kode_kota',
        'nama_kota',
    ];

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'id_provinsi');
    }
    public function kecamatan(){
        return $this->hasMany(Kecamatan::class, 'id_kota');
    }
}
