<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $kendaraanCount = Kendaraan::count();
        $pegawaiCount = User::where('level', 'user')->count();
        $peminjamanCount = Peminjaman::count();
        return view('welcome',compact('kendaraanCount','pegawaiCount','peminjamanCount'));
    }
}
