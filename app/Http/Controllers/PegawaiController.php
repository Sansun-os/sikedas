<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request){
      
        if ($request->has('search')) {
            $data = User::where('level', 'user')
                ->where(function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('jeniskelamin', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('nohp', 'LIKE', '%' . $request->search . '%');
                })
                ->paginate(5);
        } else {
            $data = User::where('level', 'user')->latest()->paginate(5);
        }
        
        return view('pegawai.index', compact('data'));
    }
    public function insert(){
        return view('akunpegawai');
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
      
            'name' => 'required',
            'email' => 'unique:users',
            // 'level' => 'required',
            // 'jenis_kelamin' => 'required',
            'password' => 'required',
            'nohp' => 'required|unique:users',
            
  
        ],[
            'name.required' => 'Tidak boleh kosong!',
            'email.required' => 'Tidak boleh kosong!',
            // 'level.required' => 'Tidak boleh kosong!',
            // 'jenis_kelamin.required' => 'Tidak boleh kosong!',
            'nohp.required' => 'Tidak boleh kosong!',
            'password.required' => 'Tidak boleh kosong!',
            'nohp.unique' => 'Nomor ini sudah terdaftar!',
            'email.unique' => 'Email ini sudah terdaftar!',
           

        ]);
        $data = new User();
       
        $data->name = $request->input('name'); // Gantilah field1 dengan nama kolom yang sesuai
        $data->jeniskelamin = $request->input('jeniskelamin'); // Gantilah field1 dengan nama kolom yang sesuai
        $data->email = $request->input('email'); // Gantilah field2 dengan nama kolom yang sesuai
        $data->nohp = $request->input('nohp'); // Gantilah field2 dengan nama kolom yang sesuai
        $data->password = bcrypt($request->input('password')); // Gantilah field2 dengan nama kolom yang sesuai
        $data->level = $request->input('level'); // Gantilah field2 dengan nama kolom yang sesuai
        $data->save();
    

   
       return redirect()->route('pegawai');
    }
    public function edit($id){
        $data = User::find($id);
        return view('pegawai.edit',compact('data'));
    }
    
    public function update(Request $request,$id){
        $validatedData = $request->validate([
      
            'name' => 'required',
            'email' => 'unique:users',
            // 'level' => 'required',
            // 'jenis_kelamin' => 'required',
            'password' => 'required',
            'nohp' => 'required|unique:users',
            
  
        ],[
            'name.required' => 'Tidak boleh kosong!',
            'email.required' => 'Tidak boleh kosong!',
            // 'level.required' => 'Tidak boleh kosong!',
            // 'jenis_kelamin.required' => 'Tidak boleh kosong!',
            'nohp.required' => 'Tidak boleh kosong!',
            'password.required' => 'Tidak boleh kosong!',
            'nohp.unique' => 'Nomor ini sudah terdaftar!',
            'email.unique' => 'Email ini sudah terdaftar!',
           

        ]);
        $data = User::find($id);
        $data->update($request->all());

        // if($request->hasFile('foto')){
        //     $request->file('foto')->move('fotopegawai/',$request->file('foto')->getClientOriginalName());
        //     $data->foto = $request->file('foto')->getClientOriginalName();
        //     $data->save($request->all());
        // }

        session()->flash('success', 'Form submitted successfully');
        return redirect()->route('pegawai')->with('success','Data Berhasil Di Edit');

    }
    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success','Data Berhasil Di Hapus');
    }
    
}
