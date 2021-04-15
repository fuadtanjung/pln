<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterAsetJaringan;
use App\DetailPengecekanJaringan;
use App\JenisAset;
use App\Unit;
use App\Ruangan;
use PDF;
use App\Exports\PengecekanjaringanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class RekapAsetJaringanController extends Controller
{
    public function index(){
        $ruangan = Ruangan::all();
        $master_aset_jaringan = MasterAsetJaringan::all();
        $detail_pengecekan_jaringan = DetailPengecekanJaringan::all();
        $jenis_asets = JenisAset::all();
        $units=Unit::all();
        return view ('rekap_laporan.rekap_aset_jaringan', compact('ruangan','master_aset_jaringan','detail_pengecekan_jaringan','jenis_asets','units'));
    }
    public function printjaringan(){
        $detail_pengecekan_jaringan= DetailPengecekanJaringan::all();
        $pdf = PDF::loadView('rekap_laporan/cetak_jaringan', compact('detail_pengecekan_jaringan'));
        return $pdf->stream();
    }
    public function asetjaringanexport(){
        return Excel::download(new PengecekanjaringanExport, 'Rekap Aset Jaringan.xlsx');
    }
  

}
