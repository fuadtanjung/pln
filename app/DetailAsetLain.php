<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailAsetLain extends Model
{
    protected $primaryKey = ['no_seri','tgl_pengecekan','nip_pegawai'];
    protected $table = 'detail_aset_lains';
    protected $fillable = ['no_seri','tgl_pengecekan','nip_pegawai','id_master_ti','tipe','kondisi'];
    public $incrementing = false;
    public $timestamps = false;

    public function master_aset_ti(){
        return $this->belongsTo(MasterAsetTi::class, 'id_master_ti', 'id_master_ti');
    }
    public function pengecekan_aset()
    {
        return $this->belongsTo('App\PengecekanAsetTi',['no_seri','tgl_pengecekan','nip_pegawai'],['no_seri','tgl_pengecekan','nip_pegawai']);
    }
    public function pegawai(){
        return $this->belongsTo(DataPegawai::class, 'nip_pegawai', 'nip_pegawai');
    }
}
