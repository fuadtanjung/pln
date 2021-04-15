<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailAsetTi;
use App\DataPegawai;
use App\MasterAsetTi;
use App\JenisAset;
use App\DetailAsetLain;
use App\Exports\PengecekanExport;
use App\Os;
use App\PengecekanAsetTi;
use App\Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AsetTiController extends Controller
{
    public function index(){
        $detail_aset_tis = DetailAsetTi::all();
        $pengecekan_aset_tis = PengecekanAsetTi::all();
        $master_aset_tis = MasterAsetTi::all();
        $pegawais = DataPegawai::all();
        $jenis_asets = JenisAset::all();
        $detail_aset_lains = DetailAsetLain::all();
        return view ('aset_ti.pengecekanti', compact('pengecekan_aset_tis','detail_aset_tis','master_aset_tis','pegawais','jenis_asets','detail_aset_lains'));
    }
    public function indexpegawai(){
        $pegawais = DataPegawai::all();
        return view ('aset_ti.pengecekanti', compact('master_aset_tis','pegawais'));
    }
    public function indexpengecekan($nip_pegawai){
        $detail_aset_tis = DetailAsetTi::where('nip_pegawai', $nip_pegawai)->get();
        $pengecekan_aset_tis = PengecekanAsetTi::all();
        $os = Os::all();
        $master_aset_tis = MasterAsetTi::where('nip_pegawai', $nip_pegawai)->get();
        $jenis_asets = JenisAset::all();
        $detail_aset_lains = DetailAsetLain::where('nip_pegawai', $nip_pegawai)->get();
        return view ('aset_ti.detailpengecekanti', compact('nip_pegawai','pengecekan_aset_tis','os','detail_aset_tis','master_aset_tis','jenis_asets','detail_aset_lains'));
    }

    public function masterAset($nip_pegawai){
        $master_aset_tis = MasterAsetTi::where('nip_pegawai', $nip_pegawai)->get();
        $masters = MasterAsetTi::all();
        $os = Os::all();
        $detail_aset_tis = DetailAsetTi::where('nip_pegawai', $nip_pegawai)->get();
        $detail_aset_lains = DetailAsetLain::where('nip_pegawai', $nip_pegawai)->get();
        // dd($master_aset_tis);
        return view('aset_ti.tambahpengecekanti', compact('master_aset_tis', 'nip_pegawai', 'masters','os','detail_aset_tis','detail_aset_lains'));
    }

    public function get_detail_asset(Request $request)
    {
        $detail_asset = MasterAsetTi::where('id_master_ti',$request->id_master_ti)->get();
        $count_master_asset = MasterAsetTi::select("jenis_aset_id",DB::raw("count('id_master_ti') as total_asset"))->groupBy('jenis_aset_id')->get();

        return response()->json([
            "detail_asset"  => $detail_asset,
            "count_asset"   => $count_master_asset,
        ]);
    }
    public function store(Request $request){
    //$master_aset_tis = MasterAsetTi::where('nip_pegawai', $nip_pegawai)->get();
        // dd($request->all());
        if($request->modal=="modal1"){
            $pengecekan_aset_tis = PengecekanAsetTi::create([
                'no_seri'=> $request->input('no_seri'),
                'tgl_pengecekan'=>$request->input('tgl_pengecekan'),
                'nip_pegawai'=>$request->input('nip_pegawai'),
                'nip_petugas'=> auth()->user()->petugas->nip_petugas,
            ]);

            $detail_aset_tis= DetailAsetTi::create ([
                'no_seri'=> $request->input('no_seri'),
                'tgl_pengecekan'=>$request->input('tgl_pengecekan'),
                'nip_pegawai'=>$request->input('nip_pegawai'),
                'id_master_ti'=> $request->input('id_master_ti'),
                'tahun_aset' => $request->input('tahun_aset'),
                'os_id'=> $request->input('os_id'),
                'lisensi'=> $request->input('lisensi'),
                'cpu_merek'=> $request->input('cpu_merek'),
                'monitor_merek'=> $request->input('monitor_merek'),
                'kondisi'=> $request->input('kondisi'),
                'status'=> $request->input('status'),
                'serial_number'=> $request->input('serial_number'),
                'ip_address'=> $request->input('ip_address'),
                'mac_address'=> $request->input('mac_address'),
                'kapasitas_memori'=> $request->input('kapasitas_memori'),
                'processor_merek'=> $request->input('processor_merek'),
                'kapasitas_processor'=> $request->input('kapasitas_processor'),
                'vga_tipe'=> $request->input('vga_tipe'),
                'vga_kapasitas'=> $request->input('vga_kapasitas'),
                'hdd_kapasitas'=> $request->input('hdd_kapasitas'),
        ]);

      }
      else if ($request->modal=="modal2"){

        $pengecekan_aset_tis = PengecekanAsetTi::create([
            'no_seri'=> $request->input('no_seri'),
            'tgl_pengecekan'=>$request->input('tgl_pengecekan'),
            'nip_pegawai'=>$request->input('nip_pegawai'),
            'nip_petugas'=> auth()->user()->petugas->nip_petugas,
        ]);
        $detail_aset_lains = DetailAsetLain::create ([
            'no_seri'=> $request->input('no_seri'),
            'tgl_pengecekan'=>$request->input('tgl_pengecekan'),
            'nip_pegawai'=>$request->input('nip_pegawai'),
            'id_master_ti'=> $request->input('id_master_ti'),
            'tipe'=>$request->input('tipe'),
            'kondisi'=>$request->input('kondisi'),
        ]);
      }

    // dd($pengecekan_aset_tis);
        // return view('aset_ti.detailpengecekanti', compact('master_aset_tis', 'nip_pegawai'));
        return redirect()->back();
    }

    public function update(Request $request){
        if($request->modal=="modal1"){
            $pengecekan_aset_tis = PengecekanAsetTi::where("no_seri",$request->no_seri)->update([
                "tgl_pengecekan" => $request->input('tgl_pengecekan'),
                "nip_pegawai" => $request->input('nip_pegawai'),
                "nip_petugas" => auth()->user()->petugas->nip_petugas,
            ]);

            $detail_aset_tis= DetailAsetTi::where("no_seri",$request->no_seri)->update([
                "tgl_pengecekan" => $request->input('tgl_pengecekan'),
                "nip_pegawai" => $request->input('nip_pegawai'),
                "id_master_ti" => $request->input('id_master_ti'),
                "tahun_aset"=> $request->input('tahun_aset'),
                "os_id"=> $request->input('os_id'),
                "lisensi"=>$request->input('lisensi'),
                "cpu_merek"=> $request->input('cpu_merek'),
                "monitor_merek"=> $request->input('monitor_merek'),
                "kondisi"=> $request->input('kondisi'),
                "status"=> $request->input('status'),
                "serial_number"=> $request->input('serial_number'),
                "ip_address"=> $request->input('ip_address'),
                "mac_address"=> $request->input('mac_address'),
                "kapasitas_memori"=>$request->input('kapasitas_memori'),
                "processor_merek"=> $request->input('processor_merek'),
                "kapasitas_processor"=>$request->input('kapasitas_processor'),
                "vga_tipe"=> $request->input('vga_tipe'),
                "vga_kapasitas"=> $request->input('vga_kapasitas'),
                "hdd_kapasitas"=> $request->input('hdd_kapasitas'),
            ]);


      }
      else if ($request->modal=="modal2"){

        $pengecekan_aset_tis = PengecekanAsetTi::where("no_seri",$request->no_seri)->update([
            "tgl_pengecekan" => $request->input('tgl_pengecekan'),
            "nip_pegawai" => $request->input('nip_pegawai'),
            "nip_petugas" => auth()->user()->petugas->nip_petugas,
        ]);

        $detail_aset_lains = DetailAsetLain::where("no_seri",$request->no_seri)->update([
            "tgl_pengecekan" => $request->input('tgl_pengecekan'),
            "nip_pegawai" =>$request->input('nip_pegawai'),
            "id_master_ti" => $request->input('id_master_ti'),
            "tipe" => $request->input('tipe'),
            "kondisi" => $request->input('kondisi'),
        ]);


      }
        return redirect()->back();
    }
    public function delete($no_seri){
       PengecekanAsetTi::where('no_seri', $no_seri)->delete();
       DetailAsetLain::where('no_seri', $no_seri)->delete();

        return redirect()->back();
    }



}
