<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataPegawai;
use App\Unit;
use App\Jabatan;
class DataPegawaiController extends Controller
{
    public function index(){
        $pegawais = DataPegawai::all();
        $units= Unit::all();
        $jabatans= Jabatan::all();
        return view ('profil.profilpegawai', compact('pegawais','units','jabatans'));
    }
    public function store(Request $request){
        $pegawais = DataPegawai::create([
            'nip_pegawai'=> $request->input('nip_pegawai'),
            'unit_id'=>$request->input('unit_id'),
            'jabatan_id'=>$request->input('jabatan_id'),
            'nama_pegawai'=> $request->input('nama_pegawai'),
            'alamat_pegawai' => $request->input('alamat_pegawai'),
            'no_hp'=> $request->input('no_hp')
    ]);
             return redirect()->route('profilview');
    }
    
    public function view(){
        return view('profil.lihatprofil');
    }

}
