<?php

namespace App\Http\Controllers;

use App\DetailAsetLain;
use Illuminate\Http\Request;
use App\MasterAsetTi;
use App\MasterAsetJaringan;
use App\PengaduanAsetTi;
use App\DetailAsetTi;
use App\PengaduanAsetJaringan;
use App\DetailPengaduanTi;
use App\DetailPengaduanJaringan;
use App\DetailPengecekanJaringan;
use Auth;
use App\Ruangan;
use App\Unit;



class PengaduanKerusakanController extends Controller
{

    public function index(){
        return view('pengaduan.index_pengaduan');
    }

    public function kelompokaset(Request $request){
    $master_aset_tis = MasterAsetTi::all();
    $master_aset_jaringan = MasterAsetJaringan::all();
    $pengaduan_ti = PengaduanAsetTi::all();
    $pengaduan_jaringan = PengaduanAsetJaringan::all();
    $detail_pengaduan_ti = DetailPengaduanTi::all();
    $detail_pengaduan_jaringan = DetailPengaduanJaringan::all();

    if($request->pilihaset=="Asetti"){
        // dd($request->request->get('http_referrer'));

        return view('pengaduan.view_pengaduan_ti', compact('master_aset_tis','pengaduan_ti','detail_pengaduan_ti'));
    }
    else {
        $request->session()->put('url',$request->path());
        return view('pengaduan.view_pengaduan_jaringan', compact('master_aset_jaringan','pengaduan_jaringan','detail_pengaduan_jaringan'));
    }
}
    public function addpengaduanti(Request $request){
    // dd(Auth::user()->nip);
    $master_aset_tis = MasterAsetTi::leftJoin('pegawais', 'pegawais.nip_pegawai', '=', 'master_aset_tis.nip_pegawai')
        ->leftJoin('users', 'users.nip', '=', 'pegawais.nip_pegawai')
        ->where('master_aset_tis.nip_pegawai', Auth::user()->nip)->get();
    $master_aset_jaringan = MasterAsetJaringan::all();
    $pengaduan_ti = PengaduanAsetTi::all();
    $pengaduan_jaringan = PengaduanAsetJaringan::all();
    $detail_pengaduan_ti = DetailPengaduanTi::all();
    $detail_pengaduan_jaringan = DetailPengaduanJaringan::all();
        return view('pengaduan.add_pengaduan_ti', compact('master_aset_tis','master_aset_jaringan','pengaduan_ti','pengaduan_jaringan','detail_pengaduan_ti','detail_pengaduan_jaringan'));
    }

    public function addpengaduanjaringan(){
        $master_aset_jaringan = MasterAsetJaringan::all();
        $detail_pengecekan_jaringan = DetailPengecekanJaringan::all();
        $ruangan = Ruangan::all();
        $unit = Unit::all();
        $pengaduan_jaringan = PengaduanAsetJaringan::all();
        $detail_pengaduan_jaringan = DetailPengaduanJaringan::all();
        return view('pengaduan.add_pengaduan_jaringan', compact('master_aset_jaringan','detail_pengecekan_jaringan','ruangan','unit','pengaduan_jaringan','detail_pengaduan_jaringan'));
    }
    // public function search($no_seri){
    //     $data = '';
    //     $ti=['KP','LP'];
    //     // dd(in_array(substr($no_seri, 0,2), $ti));
    //     if(in_array(substr($no_seri, 0,2), $ti)){
    //         $data = DetailAsetTi::where('no_seri', $no_seri)->first();
    //     }
    //     else{
    //         $data = DetailAsetLain::where('no_seri', $no_seri)->first();

    //     }
    //     if ($data){
    //         // dd ($data->detailasetti);
    //         return [
    //             'nama_master_ti'=>$data->master_aset_ti->nama_master_ti,
    //             'nip_pegawai'=>$data->pegawai->nama_pegawai
    //         ];

    //     }
    //     return [
    //         'nama_master_ti'=>'',
    //         'nip_pegawai'=>''
    //     ];
    // }
    // public function searchjaringan($nama_master_jaringan){
    //     $data = MasterAsetJaringan::where('nama_master_jaringan', $nama_master_jaringan)->first();
    //     if ($data){
    //         dd ($data);
    //         return [
    //             'ruangan'=>$data->master_jaringan->ruangan->nama_ruangan,
    //         ];
    //     }
    //     return [
    //         'ruangan'=>'',
    //     ];
    // }


    public function storeti(Request $request){
        // dd($request->all());
        // dd($request->session()->get('url'));

        $pengaduan_ti = new PengaduanAsetTi();
            $pengaduan_ti->id_pengaduan_ti=$request->input('id_pengaduan_ti');
            $pengaduan_ti->nip_pegawai=auth()->user()->pegawai->nip_pegawai;
            $pengaduan_ti->tgl_pengaduan=$request->input('tgl_pengaduan');

            $pengaduan_ti->save();

            $file = $request->file('foto');
            $tujuan_upload = public_path().'\img';
            $file->move($tujuan_upload,$file->getClientOriginalName());

            $detail_pengaduan_ti= new DetailPengaduanTi();
            $detail_pengaduan_ti->id_pengaduan_ti=$pengaduan_ti->id_pengaduan_ti;
            $detail_pengaduan_ti->id_master_ti=$request->input('master_select');
            $detail_pengaduan_ti->status_pengaduan=$request->input('status_pengaduan');
            $detail_pengaduan_ti->keterangan=$request->input('keterangan');
            $detail_pengaduan_ti->foto=$file->getClientOriginalName();
            $detail_pengaduan_ti->save();

        if ($detail_pengaduan_ti) {

            $nama = auth()->user()->pegawai->nama_pegawai;
            $nip = auth()->user()->pegawai->nip_pegawai;
            $ket = $request->input('keterangan');

            $my_apikey = 'B80X3ZPI10UKILZ2JG57';
            $nohape = '6285274312393';
            $message = "--PENGADUAN KERUSAKAN ASET TI-- \n Nama : $nama \n Nip : $nip \n Kerusakan : $ket";
            $api_url = "http://panel.rapiwha.com/send_message.php";
            $api_url .= "?apikey=" . urlencode($my_apikey);
            $api_url .= "&number=" . urlencode($nohape);
            $api_url .= "&text=" . urlencode($message);

            $my_result_object = json_decode(file_get_contents($api_url, false));

            $result = [$my_result_object->success, $my_result_object->description, $my_result_object->description];
        }

        return view('pengaduan');
        // dd($detail_pengaduan_ti);

        // $request->session()->put('url',$request->path());
        // return response()->json([
        //     "message"   => "success"
        // ]);
    }

    public function detailpengaduanti($id_pengaduan_ti){
        $master_aset_tis = MasterAsetTi::leftJoin('pegawais', 'pegawais.nip_pegawai', '=', 'master_aset_tis.nip_pegawai')
                            ->leftJoin('users', 'users.nip', '=', 'pegawais.nip_pegawai')
                            ->where('master_aset_tis.nip_pegawai', Auth::user()->nip)->get();
        $master_aset_jaringan = MasterAsetJaringan::all();
        $pengaduan_ti = PengaduanAsetTi::all();
        $pengaduan_jaringan = PengaduanAsetJaringan::all();
        $detail_pengaduan_ti = DetailPengaduanTi::where('id_pengaduan_ti', $id_pengaduan_ti)->first();
        $detail_pengaduan_jaringan = DetailPengaduanJaringan::all();
            return view('pengaduan.detail_pengaduan_ti', compact('id_pengaduan_ti','master_aset_tis','master_aset_jaringan','pengaduan_ti','pengaduan_jaringan','detail_pengaduan_ti','detail_pengaduan_jaringan'));

    }

    public function storejaringan(Request $request){
        $pengaduan_jaringan = new PengaduanAsetJaringan();
        $pengaduan_jaringan->id_pengaduan_jaringan=$request->input('id_pengaduan_jaringan');
        $pengaduan_jaringan->unit_id=auth()->user()->pegawai->unit->id_unit;
        $pengaduan_jaringan->tgl_pengaduan=$request->input('tgl_pengaduan');

        $pengaduan_jaringan->save();

        $file = $request->file('foto');
        $tujuan_upload = public_path().'\img';
        $file->move($tujuan_upload,$file->getClientOriginalName());

        $detail_pengaduan_jaringan= new DetailPengaduanJaringan();
        $detail_pengaduan_jaringan->id_pengaduan_jaringan=$pengaduan_jaringan->id_pengaduan_jaringan;
        $detail_pengaduan_jaringan->id_master_jaringan=$request->input('masterjaringan_select');
        $detail_pengaduan_jaringan->status_pengaduan=$request->input('status_pengaduan');
        $detail_pengaduan_jaringan->keterangan=$request->input('keterangan');
        $detail_pengaduan_jaringan->foto=$file->getClientOriginalName();


        $detail_pengaduan_jaringan->save();

        if ($detail_pengaduan_jaringan) {
            $nama = auth()->user()->pegawai->nama_pegawai;
            $nip = auth()->user()->pegawai->nip_pegawai;
            $ket = $request->input('keterangan');
            $ruangan = MasterAsetJaringan::join('ruangans', 'master_aset_jaringans.ruangan_id', 'ruangans.id_ruangan')
            ->select('ruangans.nama_ruangan')
            ->where('master_aset_jaringans.id_master_jaringan', $request->input('masterjaringan_select'))
            ->first();



            $my_apikey = 'B80X3ZPI10UKILZ2JG57';
            $nohape = '6285274312393';
            $message = "--PENGADUAN KERUSAKAN ASET JARINGAN-- \n Nama : $nama \n Nip : $nip \n Ruangan : $ruangan->nama_ruangan \nKerusakan : $ket";
            $api_url = "http://panel.rapiwha.com/send_message.php";
            $api_url .= "?apikey=" . urlencode($my_apikey);
            $api_url .= "&number=" . urlencode($nohape);
            $api_url .= "&text=" . urlencode($message);

            $my_result_object = json_decode(file_get_contents($api_url, false));

            $result = [$my_result_object->success, $my_result_object->description, $my_result_object->description];
        }

        return redirect()->back();

    }
    public function detailpengaduanjaringan($id_pengaduan_jaringan){
        $master_aset_jaringan = MasterAsetJaringan::all();
        $pengaduan_jaringan = PengaduanAsetJaringan::all();
        $detail_pengaduan_jaringan = DetailPengaduanJaringan::where('id_pengaduan_jaringan', $id_pengaduan_jaringan)->first();
            return view('pengaduan.detail_pengaduan_jaringan', compact('id_pengaduan_jaringan','master_aset_jaringan','pengaduan_jaringan','detail_pengaduan_jaringan'));

    }
    public function viewupdateti($id_pengaduan_ti){
        $master_aset_tis = MasterAsetTi::leftJoin('pegawais', 'pegawais.nip_pegawai', '=', 'master_aset_tis.nip_pegawai')
            ->leftJoin('users', 'users.nip', '=', 'pegawais.nip_pegawai')
            ->where('master_aset_tis.nip_pegawai', Auth::user()->nip)->get();
        $pengaduan_ti = PengaduanAsetTi::all();
        $detail_pengaduan_ti = DetailPengaduanTi::where('id_pengaduan_ti', $id_pengaduan_ti)->first();

        return view('pengaduan.edit_pengaduan_ti', compact('id_pengaduan_ti','master_aset_tis','pengaduan_ti','detail_pengaduan_ti'));


    }

    public function updatepengaduanti(Request $request){
        $pengaduan_ti = PengaduanAsetJaringan::find($request->id_pengaduan_ti);
        $pengaduan_ti->nip_pegawai=auth()->user()->pegawai->nip_pegawai;
        $pengaduan_ti->tgl_pengaduan=$request->input('tgl_pengaduan');

        $pengaduan_ti->save();

        $file = $request->file('foto');
        $tujuan_upload = public_path().'\img';
        $file->move($tujuan_upload,$file->getClientOriginalName());

        $detail_pengaduan_ti= PengaduanAsetJaringan::find($request->id_pengaduan_ti);
        $detail_pengaduan_ti->id_pengaduan_ti=$pengaduan_ti->id_pengaduan_ti;
        $detail_pengaduan_ti->id_master_ti=$request->input('master_select');
        $detail_pengaduan_ti->status_pengaduan=$request->input('status_pengaduan');
        $detail_pengaduan_ti->keterangan=$request->input('keterangan');
        $detail_pengaduan_ti->foto=$file->getClientOriginalName();

        $detail_pengaduan_ti->save();

        return redirect()->back();
    }

    public function updatepengaduanjaringan(){

    }

}
