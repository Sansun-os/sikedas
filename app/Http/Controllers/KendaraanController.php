<?php

namespace App\Http\Controllers;

use App\Models\Nopolisi;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Models\Merkkendaraan;
use App\Models\Jeniskendaraan;
use App\Models\Tipekendaraan;

class KendaraanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Kendaraan::where('jenis', 'LIKE', '%' . $request->search . '%')
                ->orWhere('tipe', 'LIKE', '%' . $request->search . '%')
                ->orWhere('merk', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nopolisi', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
           
            $jeniskendaraan = Jeniskendaraan::all();
            // $merkkendaraan = Merkkendaraan::all();
            // $nopolisi = Nopolisi::all();
            // $tipekendaraan = Tipekendaraan::all();

            $data = Kendaraan::paginate(5);
        }

        return view('kendaraan.index', compact('data', 'jeniskendaraan',));
    }
    public function tambah()
    {
        $jeniskendaraan = Jeniskendaraan::all();
        // $merkkendaraan = Merkkendaraan::all();
        // $nopolisi = Nopolisi::all();
        // $tipekendaraan = Tipekendaraan::all();
    
        return view('kendaraan.insert', compact('jeniskendaraan',));
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'id_jenis' => 'required',
            'id_merk' => 'required',
            'id_tipe' => 'required',
            'id_nopolisi' => 'required|unique:kendaraans',
            'kondisi' => 'required',
            'status' => 'required',

        ],[
            'id_jenis.required' => 'Tidak boleh kosong!',
            'id_nopolisi.unique' => 'Nopolisi ini sudah terdaftar',
            'id_merk.required' => 'Tidak boleh kosong!',
            'id_tipe.required' => 'Tidak boleh kosong!',
            'id_nopolisi.required' => 'Tidak boleh kosong!',
            'kondisi.required' => 'Tidak boleh kosong!',
            

        ]);

        $data = new Kendaraan();
        $data->id_jenis = $request->input('id_jenis'); // Gantilah field1 dengan nama kolom yang sesuai
        $data->id_merk = $request->input('id_merk'); // Gantilah field1 dengan nama kolom yang sesuai
        $data->id_tipe = $request->input('id_tipe'); // Gantilah field2 dengan nama kolom yang sesuai
        $data->id_nopolisi = $request->input('id_nopolisi'); // Gantilah field2 dengan nama kolom yang sesuai
        $data->kondisi = $request->input('kondisi'); // Gantilah field2 dengan nama kolom yang sesuai
        $data->status = $request->input('status'); // Gantilah field2 dengan nama kolom yang sesuai
        $data->save();
        return redirect()->route('kendaraan');
    }
    public function delete($id)
    {
        $data = Kendaraan::find($id);
        $data->delete();
        return redirect()->route('kendaraan')->with('success', 'Data Berhasil Di Hapus');
    }
    public function edit($id)
    {
        $data = Kendaraan::find($id);
        return view('kendaraan.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_jenis' => 'required',
            'id_merk' => 'required',
            'id_tipe' => 'required',
            'id_nopolisi' => 'required|unique:kendaraans',
            'kondisi' => 'required',
            'status' => 'required',
        ],[
            'id_jenis.required' => 'Tidak boleh kosong!',
            'id_nopolisi.unique' => 'Nopolisi ini sudah terdaftar',
            'id_merk.required' => 'Tidak boleh kosong!',
            'id_tipe.required' => 'Tidak boleh kosong!',
            'id_nopolisi.required' => 'Tidak boleh kosong!',
            'kondisi.required' => 'Tidak boleh kosong!',
        ]);
        $data = Kendaraan::find($id);
        $data->update($request->all());
        session()->flash('success', 'Form submitted successfully');
        return redirect()->route('kendaraan')->with('success', 'Data Berhasil Di Edit');
    }

    public function getJenis()
    {
        try {
            $data = Jeniskendaraan::get();
            return response()->json([
                "code" => "500",
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
}
