<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use App\Unit;

class RuanganController extends Controller
{
    public function index(){
        $ruangan = Ruangan::all();
        $units = Unit::all();
        return view ('ruangan.tambah_ruangan', compact('ruangan','units'));
    }
    public function store(Request $request){
        $ruangan = Ruangan::create([
            'id_ruangan'=> $request->input('id_ruangan'),
            'nama_ruangan'=> $request->input('nama_ruangan'),
            'unit_id' => $request->input('unitselect'),
            

        ]);
        return redirect()->back();

    }
    public function update(Request $request){
        $ruangan = Ruangan::where('id_ruangan',$request->id_ruangan)->update([
            'nama_ruangan'=> $request->input('nama_ruangan'),
            'unit_id' => $request->input('unitselect'),
        ]);
      
        return redirect()->back();
    }
    public function delete($id_ruangan){
        Ruangan::where('id_ruangan', $id_ruangan)->delete();
        
        return redirect()->back();
     }
 
}
