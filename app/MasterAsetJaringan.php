<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class MasterAsetJaringan extends Model
{
    protected $primaryKey = 'id_master_jaringan';
    protected $table = 'master_aset_jaringans';
    protected $fillable = ['id_master_jaringan','ruangan_id','jenis_aset_id', 'nama_master_jaringan'];
    public $incrementing = false;
    public $timestamps = false;

    public function ruangan(){
        return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id_ruangan');
    }
    public function jenis_aset(){
        return $this->belongsTo(JenisAset::class, 'jenis_aset_id', 'id_jenis_aset');
    }
    public function pengecekan_jaringan(){
        return $this->hasMany(DetailPengecekanJaringan::class);
    }
    public function detail_pengaduan_jaringan(){
        return $this->hasMany(DetailPengaduanJaringan::class);
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions(){
     return [
         'id_master_jaringan' => [
             'format' => 'MJ-?', // Format kode yang akan digunakan.
             'length' => 2 // Jumlah digit yang akan digunakan sebagai nomor urut
         ]
     ];
    }
}
