<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\JenisUnit;

class UnitController extends Controller
{
   public function index(){
       $units=Unit::all();
       $jenis_units=JenisUnit::all();
       return view ('unit.daftarunit', compact('units','jenis_units'));
   }

   public function store(Request $request){
    $units = new Unit([
        'jenis_id'=> $request->input('jenisselect'),
        'nama_unit'=> $request->input('nama_unit'),
        'alamat_unit'=>$request->input('alamat_unit')
    ]); 
  
    $units -> save();
    return redirect()->back();
}
    public function update (Request $request){
        $units = Unit::find($request->id_unit);
        $units-> nama_unit = $request->input('nama_unit');
        $units-> jenis_id =$request->input('jenisselect');
        $units-> alamat_unit =$request->input('alamat_unit');
        $units->save();
        return redirect()->back(); 

    }
    public function delete($id_unit){
        $units=Unit::find($id_unit)->delete();
        return redirect()->back();
    }
    

}
