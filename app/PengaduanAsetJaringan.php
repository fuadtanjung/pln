<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class PengaduanAsetJaringan extends Model
{
    protected $primaryKey = ['id_pengaduan_jaringan'];
    protected $fillable = ['id_pengaduan_jaringan','unit_id', 'tgl_pengaduan'];
    protected $table = 'pengaduan_jaringans';
    public $incrementing = false;
    public $timestamps = false;

    public function detail_pengaduan_jaringan(){
        return $this->hasMany(DetailPengaduanJaringan::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id_unit');
    }
    use AutoNumberTrait;
    public function getAutoNumberOptions(){
     return [
         'id_pengaduan_jaringan' => [
             'format' => 'PJ-?', // Format kode yang akan digunakan.
             'length' => 2 // Jumlah digit yang akan digunakan sebagai nomor urut
         ]
     ];
    }
}
