<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $primaryKey = 'nip_petugas';
    protected $table = 'petugass';
    protected $fillable = ['nip_pegawai','unit_id','nama_petugas', 'alamat_petugas', 'no_hp'];
    public $incrementing = false;
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'nip_petugas', 'nip');
    } 
    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id_unit');
    }
    public function pengecekan_jaringan(){
        return $this->hasMany(DetailPengecekanJaringan::class);
    }
    public function pengecekan_aset(){
        return $this->hasMany(PengecekanAsetTi::class);
    }


}
