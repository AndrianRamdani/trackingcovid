<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dunia extends Model
{
    use HasFactory;
    
    protected $table = "dunias";

    public function kasus (){
        return $this->hasMany(Kasus::class);
    }
}
