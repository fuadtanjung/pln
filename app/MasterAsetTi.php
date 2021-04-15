<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;
class MasterAsetTi extends Model
{
    protected $primaryKey = ['id_master_ti'];
    protected $fillable = ['id_master_ti', 'jenis_aset_id', 'nip_pegawai', 'nama_master_ti'];
    protected $table = 'master_aset_tis';
    public $incrementing = false;
    public $timestamps = false;

    public function jenis_aset(){
        return $this->belongsTo(JenisAset::class, 'jenis_aset_id', 'id_jenis_aset');
    }
    public function pegawais(){
        return $this->belongsTo(DataPegawai::class, 'nip_pegawai', 'nip_pegawai');
    }
    public function detail_aset_ti(){
        return $this->hasMany(DetailAsetTi::class);
    }
    public function detail_aset_lain(){
        return $this->hasMany(DetailAsetLain::class);
    }
    public function detail_pengaduan_ti(){
        return $this->hasMany(DetailPengaduanTi::class);
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions(){
     return [
         'id_master_ti' => [
             'format' => 'M-?', // Format kode yang akan digunakan.
             'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
         ]
     ];
    }
}
