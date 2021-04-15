<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    protected $primaryKey = 'nip_pegawai';
    protected $table = 'pegawais';
    protected $fillable = ['nip_pegawai','unit_id','jabatan_id','nama_pegawai', 'alamat_pegawai', 'no_hp'];
    public $incrementing = false;
    public $timestamps = false;

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id_unit');
    }
    public function jabatan(){
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id_jabatan');
    }
    public function user(){
        return $this->belongsTo(User::class, 'nip_pegawai', 'nip');
    }
    public function master_aset_ti(){
        return $this->hasMany(MasterAsetTi::class);
    }
    public function pengaduan_aset_ti(){
        return $this->hasMany(PengaduanAsetTi::class);
    }


}
