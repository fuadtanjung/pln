<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailAsetTi;
use App\DetailAsetLain;
use App\DetailPengecekanJaringan;
use App\MasterAsetTi;
use App\PengecekanAsetTi;
use App\MasterAsetJaringan;
use App\Os;
use DB;
use PDF;

class CetakQRController extends Controller
{
    public function index(){
        $master_aset_tis = MasterAsetTi::all();
        $master_aset_jaringan = MasterAsetJaringan::all();
        $detail_aset_tis = DetailAsetTi::all();
        return view('cetak_kode_qr.view_qr_kode', compact('master_aset_jaringan','master_aset_tis','detail_aset_tis'));
    }
    public function indexqr(Request $request){
        $master_aset_tis = MasterAsetTi::all();
        $master_aset_jaringan = MasterAsetJaringan::all();
        $detail_aset_lain = DetailAsetLain::select('no_seri', 'nip_pegawai', 'tgl_pengecekan', 'kondisi','id_master_ti', DB::RAW("1 as status"));
        $detail_aset_tis = DetailAsetTi::select('no_seri', 'nip_pegawai', 'tgl_pengecekan', 'kondisi','id_master_ti',DB::RAW("2 as status"))->union($detail_aset_lain)->get();
        $detail_pengecekan_jaringan = DetailPengecekanJaringan::all();


        if($request->pilihaset=="Asetti"){
            return view('cetak_kode_qr.viewti_qr_kode', compact('master_aset_tis','detail_aset_tis'));
        }
        else {
            return view('cetak_kode_qr.viewjaringan_qr_kode', compact('master_aset_jaringan','detail_pengecekan_jaringan',));
        }
        
    }
    public function indexdetailaset($no_seri, Request $request){
        $status = $request->status;
        $master_aset_tis = MasterAsetTi::all();
        $master_aset_jaringan = MasterAsetJaringan::all();
        // $detail_pengecekan_jaringan = DetailPengecekanJaringan::where('no_seri', $no_seri)->get();
        $os = Os::all();
        if($status==2){
            $pengecekan_ti = PengecekanAsetTi::join('detail_pengecekan_tis','detail_pengecekan_tis.no_seri','=','pengecekan_aset_tis.no_seri')->where('detail_pengecekan_tis.no_seri', $no_seri)->first();
            // dd($pengecekan_ti);
            $detail_aset_tis = DetailAsetTi::where('no_seri', $no_seri)->get();
            // dd($detail_aset_tis->all());
            return view('cetak_kode_qr.detail_view_ti', compact('os','pengecekan_ti','no_seri','master_aset_jaringan','master_aset_tis','detail_aset_tis'));

        }elseif($status==1){
            $pengecekan_lain = PengecekanAsetTi::join('detail_aset_lains','detail_aset_lains.no_seri','=','pengecekan_aset_tis.no_seri')->where('detail_aset_lains.no_seri', $no_seri)->first();
            $detail_aset_lain = DetailAsetLain::where('no_seri', $no_seri)->get();
            return view('cetak_kode_qr.detail_view_lain', compact('detail_aset_lain','os','pengecekan_lain','no_seri','master_aset_jaringan','master_aset_tis',));
        }
    }
    public function indexdetailjaringan($no_seri){
        $master_aset_jaringan = MasterAsetJaringan::all();
        $detail_pengecekan_jaringan = DetailPengecekanJaringan::where('no_seri', $no_seri)->first();
        // dd($detail_pengecekan_jaringan);

        return view('cetak_kode_qr.detail_view_jaringan', compact('master_aset_jaringan','detail_pengecekan_jaringan'));
    }

    public function printQR($no_seri, $status){

        if($status==1){
            $detail_aset_lain = DetailAsetLain::where('detail_aset_lains.no_seri', $no_seri)->first();
            $pdf = PDF::loadView('qrcode', compact('no_seri', 'detail_aset_lain', 'status'));
            return $pdf->stream();
        }else{
            $detail_aset_tis = DetailAsetTi::where('detail_pengecekan_tis.no_seri', $no_seri)->first();
            $pdf = PDF::loadView('qrcode', compact('no_seri', 'detail_aset_tis', 'status'));
            return $pdf->stream();
        }

        // dd($detail_aset_lain);

    }

    public function printQRAll(Request $request){

        $data_cetak_all = [];

        foreach($request->cetak as $cetak){
            $query = DetailAsetLain::where('detail_aset_lains.no_seri', $cetak)->first();
            if($query){
                $data_cetak_all[] = [
                    "no_seri" => $query->no_seri,
                    "status"    => "1",
                    "detail_aset_lain"  => $query->no_seri
                ];
            }
            else
            {
                $query = DetailAsetTi::where('detail_pengecekan_tis.no_seri', $cetak)->first();
                $data_cetak_all[] = [
                    "no_seri"   => $query->no_seri,
                    "status"    => "2",
                    "detail_aset_lain"  => $query->no_seri,
                ];
            }
        }

        // foreach($request->cetakAll as $cetak){
        //     if($cetak["status"] == "1"){
        //         $detail_aset_lain = DetailAsetLain::where('detail_aset_lains.no_seri', $cetak["no_seri"])->first();
        //         $data_cetak_all[] = [
        //             "no_seri"   => $cetak["no_seri"],
        //             "status"    => $cetak["status"],
        //             "detail_aset_lain"  => $detail_aset_lain,
        //         ];
        //     }
        //     else{
        //         $detail_aset_tis = DetailAsetTi::where('detail_pengecekan_tis.no_seri', $cetak["no_seri"])->first();
        //         $data_cetak_all[] = [
        //             "no_seri"   => $cetak["no_seri"],
        //             "status"    => $cetak["status"],
        //             "detail_aset_lain"  => $detail_aset_tis,
        //         ];
        //     }
        // }

        // dd($data_cetak_all);

        $pdf = PDF::loadView('qrcode_all', compact('data_cetak_all'));
        return $pdf->stream();
    }

    public function printQRjaringan($no_seri){
        $detail_pengecekan_jaringan = DetailPengecekanJaringan::where('detail_pengecekan_jaringans.no_seri', $no_seri)->first();
        $pdf = PDF::loadView('qrcode_jaringan', compact('no_seri','detail_pengecekan_jaringan'));
            return $pdf->stream();
    }
    public function printQRAlljaringan(Request $request){
        $data_cetak_all = [];
        foreach($request->cetak as $cetak){
            $query = DetailPengecekanJaringan::where('detail_pengecekan_jaringans.no_seri', $cetak)->first();
            $data_cetak_all[] = [
                "no_seri" => $query->no_seri,
                "detail_pengecekan_jaringan"  => $query->no_seri
            ];
        }
        $pdf = PDF::loadView('qrcode_alljaringan', compact('data_cetak_all'));
        return $pdf->stream();
    }

}
