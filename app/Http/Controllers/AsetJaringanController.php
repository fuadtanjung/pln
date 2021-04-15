<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterAsetJaringan;
use App\DetailPengecekanJaringan;
use App\JenisAset;
use App\Unit;
use App\Ruangan;

class AsetJaringanController extends Controller
{
    public function index(){
        $ruangan = Ruangan::all();
        $master_aset_jaringan = MasterAsetJaringan::all();
        $detail_pengecekan_jaringan = DetailPengecekanJaringan::all();
        $jenis_asets = JenisAset::all();
        $units=Unit::all();
        return view ('aset_jaringan.tambah_aset_jaringan', compact('ruangan','master_aset_jaringan','detail_pengecekan_jaringan','jenis_asets','units'));
    }


    public function masterAsetJaringan($tipe, $ruangan_id, $id_master_jaringan){
        $no_seri;
        $ruangan = Ruangan::all();
        $master_aset_jaringan_count = DetailPengecekanJaringan::join('master_aset_jaringans','detail_pengecekan_jaringans.id_master_jaringan','=','master_aset_jaringans.id_master_jaringan')->where('master_aset_jaringans.jenis_aset_id',$tipe)->get();
        $master_aset_jaringan = MasterAsetJaringan::where('id_master_jaringan',$id_master_jaringan)->get();

        if($tipe=="AS-05"){
            if($master_aset_jaringan_count->isEmpty())
            {
                $no_seri = "AP-01";
            }
            else
            {
                $no_seri = "AP-".sprintf("%02d",$master_aset_jaringan_count->count() + 1);
            }
        }
        else if ($tipe=="AS-06"){
            if($master_aset_jaringan_count->isEmpty())
            {
                $no_seri = "RO-01";
            }
            else
            {
                $no_seri = "RO-".sprintf("%02d",$master_aset_jaringan_count->count() + 1);
            }
        }
        else if ($tipe=="AS-07"){
            if($master_aset_jaringan_count->isEmpty())
            {
                $no_seri = "SW-01";
            }
            else
            {
                $no_seri = "SW-".sprintf("%02d",$master_aset_jaringan_count->count() + 1);
            }
        }
        return view ('aset_jaringan.pengecekan_jaringan', compact('ruangan','master_aset_jaringan','no_seri'));
    }
    public function store(Request $request){
        $master_aset_jaringan = MasterAsetJaringan::create([
            'id_master_jaringan' => $request->input('id_master_jaringan'),
            'unit_id' => $request->input('unitselect'),
            'ruangan_id'=> $request->input('ruanganselect'),
            'jenis_aset_id'=> $request->input('jenisselect'),
            'nama_master_jaringan' => $request->input('nama_master_jaringan')

        ]);
        return redirect()->back();
    }

    public function storedetail(Request $request){
        $detail_pengecekan_jaringan = DetailPengecekanJaringan::create([
            'no_seri' => $request->input('no_seri'),
            'tgl_pengecekan' => $request->input('tgl_pengecekan'),
            'id_master_jaringan' => $request->input('id_master_jaringan'),
            'nip_petugas' => $request->input('nip_petugas'),
            'tipe' => $request->input('tipe'),
            'kondisi'=> $request->input('kondisi'),

        ]);

        return redirect()->route('view.jaringan')->with('success','Data berhasil ditambahkan');
    }

    public function update(Request $request){
        $detail_pengecekan_jaringan = MasterAsetJaringan::where('id_master_jaringan', $request->id_master_jaringan)->update([
         'ruangan_id' => $request->input('ruanganselect'),
         'jenis_aset_id'=> $request->input('jenisselect'),
         'nama_master_jaringan'=> $request->input('nama_master_jaringan'),

         ]);

        return redirect()->back();
    }
    public function indexdetail($tipe, $id_master_jaringan){
        $ruangan = Ruangan::all();
        $master_aset_jaringan = MasterAsetJaringan::where('id_master_jaringan',$id_master_jaringan)->get();
        $detail_pengecekan_jaringan = DetailPengecekanJaringan::join('master_aset_jaringans','detail_pengecekan_jaringans.id_master_jaringan','=','master_aset_jaringans.id_master_jaringan')->where('master_aset_jaringans.jenis_aset_id',$tipe)->first();
        $jenis_asets = JenisAset::all();
        $units=Unit::all();
        // dd($detail_pengecekan_jaringan );
        return view ('aset_jaringan.detail_pengecekan_jaringan', compact('ruangan','master_aset_jaringan','detail_pengecekan_jaringan','jenis_asets','units'));
    }

    public function updatedetail(Request $request){
        $detail_pengecekan_jaringan = DetailPengecekanJaringan::where('no_seri',$request->no_seri)->update([

            'tgl_pengecekan' => $request->input('tgl_pengecekan'),
            'id_master_jaringan' => $request->input('id_master_jaringan'),
            'nip_petugas' => $request->input('nip_petugas'),
            'tipe' => $request->input('tipe'),
            'kondisi'=> $request->input('kondisi'),

        ]);

        return redirect()->route('view.jaringan');
    }
    public function deletejaringan($id_master_jaringan){
        MasterAsetJaringan::where('id_master_jaringan', $id_master_jaringan)->delete();
         return redirect()->back();
     }

     public function deletedetail($no_seri){
         DetailPengecekanJaringan::where('no_seri', $no_seri)->delete();
         return redirect()->route('view.jaringan');
     }


}
