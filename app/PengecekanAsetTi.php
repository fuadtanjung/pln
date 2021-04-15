<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengecekanAsetTi extends Model
{
    use \Awobaz\Compoships\Compoships;

    protected $primaryKey = ['no_seri', 'tgl_pengecekan', 'nip_pegawai'];
    protected $fillable = ['no_seri', 'tgl_pengecekan', 'nip_pegawai','nip_petugas'];
    public $incrementing = false;
    public $timestamps = false;

    public function detailasetti()
    {
        return $this->hasMany('App\DetailAsetTi',['no_seri','tgl_pengecekan','nip_pegawai'],['no_seri','tgl_pengecekan','nip_pegawai']);
    }
    public function detail_aset_lain()
    {
        return $this->hasMany(DetailAsetLain::class);
    }
    public function petugas(){
        return $this->belongsTo(Petugas::class, 'nip_petugas','nip_petugas');
    }
    public function pegawai(){
        return $this->belongsTo(DataPegawai::class, 'nip_pegawai', 'nip_pegawai');
    }


}
