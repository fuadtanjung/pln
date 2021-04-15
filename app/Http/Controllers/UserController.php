<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataPegawai;
use App\Unit;
use App\Jabatan;
use App\Role;
use App\User;

class UserController extends Controller
{
    public function viewDaftarPegawai(){
        $user = User::all();
        $pegawais = DataPegawai::all();
        $units= Unit::all();
        $jabatans= Jabatan::all();
        $role = Role::all();
        return view ('pegawai.daftar_pegawai' , compact('user','pegawais','units','jabatans','role'));
    }

    public function store(Request $request){

        $user = User::create([
            'nip'=> $request->input('nip'),
            'role_id'=> $request->input('roleselect'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),

        ]);

        $pegawais = DataPegawai::create([
            'nip_pegawai'=> $request->input('nip'),
            'unit_id'=> $request->input('unitselect'),
            'jabatan_id' => $request->input('jabatanselect'),
            'nama_pegawai' => $request->input('nama_pegawai'),
            'alamat_pegawai' => $request->input('alamat_pegawai'),
            'no_hp' => $request->input('no_hp'),
        ]);
        return redirect()->back();
    }
}
