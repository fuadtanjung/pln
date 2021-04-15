<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailAsetTi;
use App\PengaduanAsetTi;
use App\DetailPengaduanTi;
use App\PengaduanAsetJaringan;
use App\DetailPengaduanJaringan;
use App\MasterAsetTi;
use App\MasterAsetJaringan;
use App\Unit;
use Auth;


class RekapPengaduanController extends Controller
{
    public function index(){
        $pengaduan_ti = PengaduanAsetTi::all();
        $pengaduan_jaringan = PengaduanAsetJaringan::all();
        $detail_pengaduan_ti = DetailPengaduanTi::all();
        $detail_pengaduan_jaringan = DetailPengaduanJaringan::all();

        return view('rekap_pengaduan.lihat_pengaduan', compact('pengaduan_ti','pengaduan_jaringan','detail_pengaduan_ti','detail_pengaduan_jaringan'));
    }
    public function indexjaringan(){
        $pengaduan_jaringan = PengaduanAsetJaringan::all();
        $detail_pengaduan_jaringan = DetailPengaduanJaringan::all();

        return view('rekap_pengaduan.lihat_pengaduanjaringan', compact('pengaduan_jaringan','detail_pengaduan_jaringan'));
    }

    public function viewrekapti($id_pengaduan_ti){
        $master = MasterAsetTi::leftJoin('detail_pengaduan_tis', 'detail_pengaduan_tis.id_master_ti', '=', 'master_aset_tis.id_master_ti')
        ->where('master_aset_tis.id_master_ti')->get();
        // dd($master);
        $pengaduan_ti = PengaduanAsetTi::all();
        $pengaduan_jaringan = PengaduanAsetJaringan::all();
        $detail_pengaduan_ti = DetailPengaduanTi::where('id_pengaduan_ti', $id_pengaduan_ti)->first();

        $detail_pengaduan_jaringan = DetailPengaduanJaringan::all();

        return view('rekap_pengaduan.edit_pengaduan', compact('master','id_pengaduan_ti','pengaduan_ti','pengaduan_jaringan','detail_pengaduan_ti','detail_pengaduan_jaringan'));

    }
    public function update(Request $request, $id_pengaduan_ti){

        // dd($request->all());
        $detail_pengaduan_ti= DetailPengaduanTi::where("id_pengaduan_ti",$id_pengaduan_ti)->update([
            'status_pengaduan'=>$request->input('status_pengaduan'),
            'tanggapan'=>$request->input('tanggapan'),

        ]);
        return redirect()-> route('view.rekappengaduan');
    }
    public function detailrekap($id_pengaduan_ti){
        $master_aset_tis = MasterAsetTi::leftJoin('pegawais', 'pegawais.nip_pegawai', '=', 'master_aset_tis.nip_pegawai')
            ->leftJoin('users', 'users.nip', '=', 'pegawais.nip_pegawai')
            ->where('master_aset_tis.nip_pegawai', Auth::user()->nip)->get();
        $pengaduan_ti = PengaduanAsetTi::all();
        $detail_pengaduan_ti = DetailPengaduanTi::where('id_pengaduan_ti', $id_pengaduan_ti)->first();
        $detail_pengaduan_jaringan = DetailPengaduanJaringan::all();
            return view('rekap_pengaduan.detail_rekap_pengaduan_ti', compact('id_pengaduan_ti','master_aset_tis','pengaduan_ti','detail_pengaduan_ti','detail_pengaduan_jaringan'));

    }
    public function viewrekapjaringan($id_pengaduan_jaringan){
        $unit = Unit::all();
        $master_aset_jaringan = MasterAsetJaringan::all();
        $pengaduan_jaringan = PengaduanAsetJaringan::all();
        $detail_pengaduan_jaringan = DetailPengaduanJaringan::where('id_pengaduan_jaringan', $id_pengaduan_jaringan)->first();

        return view('rekap_pengaduan.edit_pengaduan_jaringan', compact('unit','master_aset_jaringan','id_pengaduan_jaringan','pengaduan_jaringan','detail_pengaduan_jaringan'));

    }

    public function updatejaringan(Request $request, $id_pengaduan_jaringan){
        // dd($request->all());
        $detail_pengaduan_jaringan= DetailPengaduanJaringan::where("id_pengaduan_jaringan",$id_pengaduan_jaringan)->update([
            'status_pengaduan'=>$request->input('status_pengaduan'),
            'tanggapan'=>$request->input('tanggapan'),

        ]);
        return redirect()-> route('view.rekappengaduan_jaringan');
    }

    public function detailrekapjaringan($id_pengaduan_jaringan){
        $pengaduan_jaringan = PengaduanAsetJaringan::all();
        $detail_pengaduan_jaringan= DetailPengaduanJaringan::where('id_pengaduan_jaringan', $id_pengaduan_jaringan)->first();

            return view('rekap_pengaduan.detail_rekap_pengaduan_jaringan', compact('id_pengaduan_jaringan','pengaduan_jaringan','detail_pengaduan_jaringan'));

    }
}
