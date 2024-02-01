<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Hash;

class KelolaadminController extends Controller
{
    public function index(){
        $data = User::all();
        // $user = User::where('level', $level)->where('name', $name)->firstOrFail();
        $data = User::where('level','admin')->latest()->paginate(5);
        return view('kelola_admin.index',compact('data'));
    }
    public function tambah(){
        $data = User::all();
        return view('kelola_admin.insert',compact('data'));
    }
    public function insert(Request $request){
        $data = new User();
        $data->name = $request->input('name'); // Gantilah field1 dengan nama kolom yang sesuai
        $data->email = $request->input('email'); // Gantilah field1 dengan nama kolom yang sesuai
        $data->password = bcrypt($request->input('password')); // Gantilah field2 dengan nama kolom yang sesuai
        $data->level = $request->input('level'); // Gantilah field2 dengan nama kolom yang sesuai
        $data->save();
        return redirect()->route('kelolaadmin');
    }
    public function edit($id){
        $data = User::find($id);
        return view('kelola_admin.edit',compact('data'));
    }
    public function update(Request $request,$id){
        $data = User::find($id);
        $data->update($request->all());
        session()->flash('success', 'Form submitted successfully');
        return redirect()->route('kelolaadmin')->with('success', 'Data Berhasil Di Edit');
    }
}
