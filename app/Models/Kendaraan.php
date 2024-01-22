<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    public $table = 'kendaraans';

    protected $fillable = ['id','id_jenis','id_merk','id_tipe','id_nopolisi','kondisi','status'];
    
    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
    public function jeniskendaraan()
    {
        return $this->belongsTo('\App\Models\Jeniskendaraan','id_jenis')->withDefault([
            'jeniskendaraan' => 'tidak ada',
        ]);;
    }
    public function merkkendaraan()
    {
        return $this->belongsTo('\App\Models\Merkkendaraan','id_merk')->withDefault([
            'merk' => 'tidak ada',
        ]);;
    }
    public function nopolisi()
    {
        return $this->belongsTo('\App\Models\Nopolisi','id_nopolisi')->withDefault([
            'nopolisi' => 'tidak ada',
        ]);;
    }
    public function tipekendaraan()
    {
        return $this->belongsTo('\App\Models\Tipekendaraan','id_tipe')->withDefault([
            'tipe' => 'tidak ada',
        ]);;
    }
}
