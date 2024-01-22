<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    public $table = 'pengembalians';
    protected $fillable = [
        'id','peminjaman_id'
    ];
    public function pegawai()
    {
        return $this->belongsTo('\App\Models\Pegawai','namapegawai_id')->withDefault([
            'namapegawai' => 'tidak ada',
        ]);;
    }
    public function kendaraan()
    {
        return $this->belongsTo('\App\Models\Kendaraan','')->withDefault([
            'jenis' => 'tidak ada',
            'merk' => 'tidak ada',
            'tipe' => 'tidak ada',
            'nopolisi' => 'tidak ada',
        ]);;
    }
    public function jeniskendaraan()
    {
        return $this->belongsTo('\App\Models\Jeniskendaraan','')->withDefault([
            'jeniskendaraan' => 'tidak ada',
        ]);;
    }
   
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function peminjaman()
    {
        return $this->belongsTo('\App\Models\Peminjaman','peminjaman_id');
    }
}
