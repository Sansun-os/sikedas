<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Nopolisi;
use App\Models\Kendaraan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Merkkendaraan;
use App\Models\Tipekendaraan;
use App\Models\Jeniskendaraan;
use App\Models\Pengembalian;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class RiwayatpengembalianController extends Controller
{
    public function index()
    {
        $dataPeminjaman = Peminjaman::select('user_id','jenis_id', 'merk_id','tipe_id', 'nopolisi_id','tujuan','created_at','updated_at')->get();
        return view('riwayatpengembalian.index', ['dataPeminjaman' => $dataPeminjaman]);
        // $username2 = User::all();

        // $user = User::where('name', $name)->firstOrFail();
        // $data = Pengembalian::with('peminjaman','jeniskendaraan')->get();
        // // $user = User::where('level', $level)->where('name', $name)->firstOrFail();
        // return view('riwayatpengembalian.index',compact('data'));
    }
   
}
