<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengecekanJaringan extends Model
{
    protected $primaryKey = ['no_seri', 'tgl_pengecekan'];
    protected $table = 'detail_pengecekan_jaringans';
    protected $fillable = ['no_seri', 'tgl_pengecekan','id_master_jaringan', 'nip_petugas','tipe','kondisi'];
    public $incrementing = false;
    public $timestamps = false;

    public function master_jaringan(){
        return $this->belongsTo(MasterAsetJaringan::class, 'id_master_jaringan','id_master_jaringan');
    }
    public function petugas(){
        return $this->belongsTo(Petugas::class, 'nip_petugas','nip_petugas');
    }
    public function ruangan(){
        return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id_ruangan');
    }

}
