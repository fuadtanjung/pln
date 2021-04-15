<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailAsetTi;
use App\DataPegawai;
use App\MasterAsetTi;
use App\JenisAset;
use App\DetailAsetLain;
use App\PengecekanAsetTi;
use PDF;
use App\Exports\PengecekanTIExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\PengecekanasetlainExport;

class RekapAsetTiController extends Controller
{
    public function index(){
        $detail_aset_tis = DetailAsetTi::all();
        $pengecekan_aset_tis = PengecekanAsetTi::all();
        $master_aset_tis = MasterAsetTi::all();
        $pegawais = DataPegawai::all();
        $jenis_asets = JenisAset::all();
        $detail_aset_lains = DetailAsetLain::all();
        return view ('rekap_laporan.rekap_aset_ti', compact('pengecekan_aset_tis','detail_aset_tis','master_aset_tis','pegawais','jenis_asets','detail_aset_lains'));
    }
    public function indexlain(){
        $detail_aset_lains = DetailAsetLain::all();
        $master_aset_tis = MasterAsetTi::all();
        return view ('rekap_laporan.rekap_aset_ti', compact('detail_aset_lains','master_aset_tis'));
    }

    public function printti(){
        $detail_aset_tis= DetailAsetTi::all();
        $pdf = PDF::loadView('rekap_laporan/cetak_ti', compact('detail_aset_tis'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
    public function asettiexport(){
        return Excel::download(new PengecekanTIExport, 'Rekap Aset TI.xlsx');
    }
    public function printlain(){
        $detail_aset_lains= DetailAsetLain::all();
        $pdf = PDF::loadView('rekap_laporan/cetak_lain', compact('detail_aset_lains'));
        return $pdf->stream();
    }
    public function asetlainexport(){
        return Excel::download(new PengecekanasetlainExport, 'Rekap Aset Perangkat Lain.xlsx');
    }
}
