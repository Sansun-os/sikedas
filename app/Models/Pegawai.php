<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = ['id','nip','namapegawai','password','alamat','jeniskelamin','nohp','foto'];

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
    
}
