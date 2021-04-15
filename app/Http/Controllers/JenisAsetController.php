<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisAset;

class JenisAsetController extends Controller
{
    public function index(){
        $jenis_asets = JenisAset::all();
        return view ('jenis_aset.daftaraset', compact('jenis_asets'));
    }
    public function store(Request $request){
        $jenis_asets = new JenisAset([
            'nama_jenis_aset'=> $request->input('nama_jenis_aset')
            ]);
        $jenis_asets -> save();
        return redirect()->back();
    }
    public function update(Request $request){
        $jenis_asets=JenisAset::find($request->id_jenis_aset);
        $jenis_asets->nama_jenis_aset= $request->input('nama_jenis_aset');
        $jenis_asets->save();
        return redirect()->back();
    }

    public function delete($id_jenis_aset){
        $jenis_asets=JenisAset::find($id_jenis_aset)->delete();
        return redirect()->back();
    }
}

