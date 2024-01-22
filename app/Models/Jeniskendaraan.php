<?php

namespace App\Models;

use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jeniskendaraan extends Model
{
    use HasFactory;
    protected $table = "jeniskendaraans";
    protected $fillable = [
        'id','jeniskendaraan'
    ];

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
     public function kendaraan(){
        return $this->hasMany(Kendaraan::class);
    }
   
}
