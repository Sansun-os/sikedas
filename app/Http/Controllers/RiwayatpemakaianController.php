<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Jeniskendaraan;
use Illuminate\Routing\Controller;

class RiwayatpemakaianController extends Controller
{
    public function index()
    {
         // $username2 = User::all();

        // $user = User::where('name', $name)->firstOrFail();
        if (auth()->user()->level == "admin") {
            // Jika pengguna adalah admin, ambil semua data
            $data = Peminjaman::latest()->paginate(5);
        } else {

            // Jika pengguna bukan admin, ambil data berdasarkan user_id
            $data = Peminjaman::where('user_id', auth()->user()->id)
            ->where('keterangan','dipinjam')
            ->latest()
            ->paginate(5);
        }
        $data = Peminjaman::where('keterangan', 'dipinjam')->get();
        $peminjamans = Peminjaman::with('kendaraan')->get();

        $user = User::all();
        $kendaraan = Kendaraan::all();
        $jeniskendaraan = Jeniskendaraan::all();
        return view(
            'riwayatpemakaian.index',
            compact('data', 'jeniskendaraan', 'user', 'kendaraan', 'peminjamans')
        );
    }
}

