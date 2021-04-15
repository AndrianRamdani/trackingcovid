<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $table = "trackings";
    protected $fillable = [
        'id_rw',
        'jumlah_positif',
        'jumlah_meninggal',
        'jumlah_sembuh',
        'tanggal'
    ];

    public function rw(){
        return $this->belongsTo('App\Models\Rw', 'id_rw');
    }
}
