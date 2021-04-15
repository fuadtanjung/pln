<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class PengaduanAsetTi extends Model
{
    protected $primaryKey = ['id_pengaduan_ti'];
    protected $fillable = ['id_pengaduan_ti', 'id_master_ti', 'nip_pegawai', 'tgl_pengaduan'];
    protected $table = 'pengaduan_aset_tis';
    public $incrementing = false;
    public $timestamps = false;

    public function pegawais(){
        return $this->belongsTo(DataPegawai::class, 'nip_pegawai', 'nip_pegawai');
    }
    public function detail_pengaduan_ti(){
        return $this->hasMany(DetailPengaduanTi::class);
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions(){
     return [
         'id_pengaduan_ti' => [
             'format' => 'P-?', // Format kode yang akan digunakan.
             'length' => 2 // Jumlah digit yang akan digunakan sebagai nomor urut
         ]
     ];
    }
}
