<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Unit extends Model
{
   protected $fillable = ['id_unit', 'jenis_id', 'nama_unit', 'alamat_unit'];
   protected $primaryKey = 'id_unit';
   public $incrementing = false;
   public $timestamps = false;

    public function jenisUnit(){
    return $this->belongsTo(JenisUnit::class, 'jenis_id', 'id_jenis_unit');
}
    public function petugas(){
    return $this->hasMany(Petugas::class);
}
    public function ruangan(){
    return $this->hasMany(Ruangan::class);
}
    public function pengaduan_aset_jaringan(){
    return $this->hasMany(PengaduanAsetJaringan::class);
}

   use AutoNumberTrait;
   public function getAutoNumberOptions(){
    return [
        'id_unit' => [
            'format' => 'U-?', // Format kode yang akan digunakan.
            'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
        ]
    ];
   }
}
