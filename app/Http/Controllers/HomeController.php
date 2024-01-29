<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $kendaraanCount = Kendaraan::count();
        $pegawaiCount = User::where('level', 'user')->count();
        $peminjamanCount = Peminjaman::count();
        $riwayatpemakaianCount = Pengembalian::count();
        return view('welcome',compact('kendaraanCount','pegawaiCount','peminjamanCount','riwayatpemakaianCount'));
    }
}
