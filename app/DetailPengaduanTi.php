<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;


class DetailPengaduanTi extends Model
{
    protected $primaryKey = ['id_pengaduan_ti'];
    protected $fillable = ['id_pengaduan_ti','id_master_ti','status_pengaduan','foto','keterangan'];
    protected $table = 'detail_pengaduan_tis';
    public $incrementing = false;
    public $timestamps = false;

    public function master_aset_ti(){
        return $this->belongsTo(MasterAsetTi::class, 'id_master_ti', 'id_master_ti');
    }
    public function pengaduan_aset_ti(){
        return $this->belongsTo(PengaduanAsetTi::class, 'id_pengaduan_ti', 'id_pengaduan_ti');
    }
   
}
