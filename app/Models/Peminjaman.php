<?php

namespace App\Models;

use App\Models\Pengembalian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    public $table = 'peminjamans';
    protected $fillable = [
        'id','kendaraan_id','jenis_id','merk_id','tipe_id','nopolisi_id','tujuan','keterangan','status','kondisi_pengembalian'
    ];
    public function pegawai()
    {
        return $this->belongsTo('\App\Models\Pegawai','namapegawai_id')->withDefault([
            'namapegawai' => 'tidak ada',
        ]);;
    }
    public function kendaraan()
    {
        return $this->belongsTo('\App\Models\Kendaraan','id')->withDefault([
            'status' => 'tidak ada',
        ]);;
    }
    public function jeniskendaraan()
    {
        return $this->belongsTo('\App\Models\Jeniskendaraan','jenis_id')->withDefault([
            'jeniskendaraan' => 'tidak ada',
        ]);;
    }
   
    public function user(){
        return $this->belongsTo(User::class);
    }
  
    public function pengembalian(){
        return $this->hasMany(Pengembalian::class,'peminjaman_id');
    }
    
}
