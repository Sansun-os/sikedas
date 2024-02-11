<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Jeniskendaraan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class RiwayatpemakaianController extends Controller
{
    public function index(Request $request)
    {
         // $username2 = User::all();

        // $user = User::where('name', $name)->firstOrFail();
        if (auth()->user()->level == "admin") {
            // Jika pengguna adalah admin, ambil semua data
            $searchTerm = request()->input('search'); // Ambil nilai dari query parameter 'search'
            
            $data = Peminjaman::latest()->paginate(5);
            $posts = DB::table('pengembalians')
                ->join('peminjamans', 'pengembalians.peminjaman_id', '=', 'peminjamans.id')
                ->join('users', 'peminjamans.user_id', '=', 'users.id')
                ->select('pengembalians.*', 'peminjamans.jenis_id as jenis',
                    'peminjamans.merk_id as merk',
                    'peminjamans.tipe_id as tipe',
                    'peminjamans.nopolisi_id as nopolisi',
                    'peminjamans.user_id as user',
                    'peminjamans.tujuan as tujuan',
                    'peminjamans.created_at as created',
                    'peminjamans.keterangan as keterangan',
                    'users.name as username')
                ->where(function ($query) use ($searchTerm) {
                    $query->where('peminjamans.jenis_id', 'like', '%' . $searchTerm . '%')
                        ->orWhere('peminjamans.tipe_id', 'like', '%' . $searchTerm . '%')
                        ->orWhere('peminjamans.nopolisi_id', 'like', '%' . $searchTerm . '%')
                        ->orWhere('peminjamans.tujuan', 'like', '%' . $searchTerm . '%')
                        ->orWhere('peminjamans.merk_id', 'like', '%' . $searchTerm . '%');
                })
                ->get();
        } 
        
        $peminjamans = Peminjaman::with('kendaraan')->get();

        $user = User::all();
        $kendaraan = Kendaraan::all();
        $jeniskendaraan = Jeniskendaraan::all();
        return view(
            'riwayatpemakaian.index',
            compact('data', 'jeniskendaraan', 'user', 'kendaraan', 'peminjamans','posts')
        );
    }
}

