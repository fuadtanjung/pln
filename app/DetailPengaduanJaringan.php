<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengaduanJaringan extends Model
{
    protected $primaryKey = ['id_pengaduan_jaringan'];
    protected $fillable = ['id_pengaduan_jaringan','id_master_jaringans','status_pengaduan','foto','keterangan'];
    protected $table = 'detail_pengaduan_jaringans';
    public $incrementing = false;
    public $timestamps = false;

    public function master_aset_jaringan(){
        return $this->belongsTo(MasterAsetJaringan::class, 'id_master_jaringan', 'id_master_jaringan');
    }
    public function pengaduan_aset_jaringan(){
        return $this->belongsTo(PengaduanAsetJaringan::class, 'id_pengaduan_jaringan', 'id_pengaduan_jaringan');
    }

}
