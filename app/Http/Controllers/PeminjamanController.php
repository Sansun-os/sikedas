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

class PeminjamanController extends Controller
{
    public function index()
    {
        // $username2 = User::all();

        // $user = User::where('name', $name)->firstOrFail();
        if (auth()->user()->level == "admin") {
            // Jika pengguna adalah admin, ambil semua data
            $data = Peminjaman::latest()->paginate(20);
        } else {

            // Jika pengguna bukan admin, ambil data berdasarkan user_id
            $data = Peminjaman::where('user_id', auth()->user()->id)
                ->where('keterangan', 'dipinjam')
                ->latest()
                ->paginate(20);
        }
        $pinjam = Peminjaman::where('keterangan', 'dipinjam')->get();
        $peminjamans = Peminjaman::with('kendaraan')->get();

        $user = User::all();
        $kendaraan = Kendaraan::all();
        $jeniskendaraan = Jeniskendaraan::all();
        return view(
            'peminjaman.index',
            compact('data', 'jeniskendaraan', 'user', 'kendaraan', 'peminjamans', 'pinjam')
        );
    }
    public function tambah()
    {
        // dd(auth()->user());
        $userName = auth()->user()->name;
        $userId = auth()->user()->id;

        $kendaraan = Kendaraan::all();
        $pegawai = Pegawai::all();
        return view('peminjaman.insert', compact('kendaraan', 'pegawai', 'userName', 'userId'));
    }
    public function getKendaraan($id)
    {

        $tipe = Peminjaman::leftJoin("kendaraans", "kendaraans.id", "=", "peminjamans.tipe_id")
            ->where("tipe_id", $id)
            ->get();
        return response()->json($tipe);
    }
    public function insert(Request $request)
    {

        // dd($request->all());
        DB::beginTransaction();
        try {
            $data = new Peminjaman();

            $data->user_id = $request->input('userId');
            $data->kendaraan_id = $request->input('kendaraan_id');
            $data->jenis_id = $request->input('jenis_id'); // Gantilah field1 dengan nama kolom yang sesuai
            $data->merk_id = $request->input('merk_id'); // Gantilah field2 dengan nama kolom yang sesuai
            $data->tipe_id = $request->input('tipe_id'); // Gantilah field2 dengan nama kolom yang sesuai
            $data->nopolisi_id = $request->input('nopolisi_id'); // Gantilah field2 dengan nama kolom yang sesuai
            $data->tujuan = $request->input('tujuan'); // Gantilah field2 dengan nama kolom yang sesuai
            $data->keterangan = $request->input('keterangan'); // Gantilah field2 dengan nama kolom yang sesuai
            $data->kondisi_pengembalian = $request->input('kondisi_pengembalian'); // Gantilah field2 dengan nama kolom yang sesuai
            $data->save();

            $id = $request->input('kendaraan_id');;
            // dd($id);

            Kendaraan::where("id", $id)->update([
                "status" => "Sedang Digunakan",
            ]);

            DB::commit();
            return redirect()->route('peminjaman');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }
    public function edit($id)
    {
        $kendaraan = Kendaraan::all();
        $pegawai = Pegawai::all();
        $user = User::all();
        $userName = auth()->user()->name;
        $userId = auth()->user()->id;
        $peminjaman = Peminjaman::with('pegawai', 'kendaraan')->findorfail($id);
        return view('peminjaman.edit', compact('peminjaman', 'kendaraan', 'pegawai', 'user', 'userId', 'userName'));
    }
    public function update(Request $request, $id)
    {
        $data = Peminjaman::find($id);
        $data->update($request->all());
        session()->flash('success', 'Form submitted successfully');
        return redirect()->route('peminjaman')->with('success', 'Data Berhasil Di Edit');
    }

    public function delete($id)
    {
        // Temukan peminjaman berdasarkan ID
        $peminjaman = Peminjaman::find($id);

        // Jika peminjaman ditemukan
        if ($peminjaman) {
            // Temukan kendaraan terkait
            $kendaraan = $peminjaman->kendaraan;

            // Ubah status kendaraan menjadi tersedia
            if ($kendaraan) {
                $kendaraan->update(['status' => 'Tersedia']);
            }

            // Hapus peminjaman
            $peminjaman->delete();

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Peminjaman berhasil dihapus, dan status kendaraan diubah menjadi tersedia');
        } else {
            // Redirect dengan pesan error jika peminjaman tidak ditemukan
            return redirect()->back()->with('error', 'Peminjaman tidak ditemukan');
        }
    }



    // public function getJenis()
    // {
    //     try {
    //         $data = Jeniskendaraan::get();
    //         return response()->json([
    //             "code" => "00",
    //             "message" => "success",
    //             "data" => $data,
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             "code" => "500",
    //             "message" => $th->getMessage(),
    //             "data" => []
    //         ]);
    //     }
    // }

    // public function getMerk(Request $request)
    // {
    //     try {
    //         $id = $request->id;
    //         $data = Merkkendaraan::where("jenis_id", $id)->get();

    //         return response()->json([
    //             "code" => "00",
    //             "message" => "success",
    //             "data" => $data,
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             "code" => "500",
    //             "message" => $th->getMessage(),
    //             "data" => []
    //         ]);
    //     }
    // }

    // public function getTipe(Request $request)
    // {
    //     try {
    //         $data = Tipekendaraan::get();
    //         return response()->json([
    //             "code" => "00",
    //             "message" => "success",
    //             "data" => $data,
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             "code" => "500",
    //             "message" => $th->getMessage(),
    //             "data" => []
    //         ]);
    //     }
    // }

    public function getSelectKendaraan(Request $request)
    {
        try {
            $data = Kendaraan::select("*")->where("status", "Tersedia")->get();

            return response()->json([
                "code" => "00",
                "message" => "success",
                "data" => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "code" => "500",
                "message" => $th->getMessage(),
                "data" => []
            ]);
        }
    }
    public function getSelectEditKendaraan(Request $request)
    {
        try {
            $id = $request->id;
            $peminjaman = Peminjaman::select("*")->where("id", $id)->first();
            $kendaraanId = $peminjaman->kendaraan_id;
            
            $data = Kendaraan::select("*")
            ->where("status", "Tersedia")
            ->orWhere("id", $kendaraanId)
            ->get();

            return response()->json([
                "code" => "00",
                "message" => "success",
                "data" => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "code" => "500",
                "message" => $th->getMessage(),
                "data" => []
            ]);
        }
    }

    public function findKendaraan(Request $request)
    {
        try {
            $id = $request->id;
            $data = Kendaraan::select("*")->where("id", $id)->first();

            return response()->json([
                "code" => "00",
                "message" => "success",
                "data" => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "code" => "500",
                "message" => $th->getMessage(),
                "data" => []
            ]);
        }
    }

    public function getPeminjaman(Request $request)
    {
        $id = auth()->user()->id;

        $data = Peminjaman::where("user_id", $id)->where("keterangan", "dipinjam")->get();

        return response()->json([
            "code" => "00",
            "message" => "success",
            "data" => $data
        ]);
    }

    public function insertPengembalian(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = $request->id;
            $idKendaraan = $request->idKendaraan;
            $kondisi_pengembalian = $request->kondisi_pengembalian;

            Kendaraan::where("id", $idKendaraan)->update(["status" => "Tersedia"]);

            Peminjaman::where("id", $id)->update(["keterangan" => "dikembalikan", 
            "kondisi_pengembalian" => $kondisi_pengembalian,]);
            Peminjaman::all();
            Pengembalian::insert([
                "peminjaman_id" => $id,
                "created_at" => date("Y-m-d H:i:s"),
            ]);

            DB::commit();

            return response()->json([
                "code" => "00",
                "message" => "success",
                "data" => []
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "code" => "500",
                "message" => $th->getMessage(),
                "data" => []
            ]);
        }
    }
}
