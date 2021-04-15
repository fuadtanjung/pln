<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $primaryKey = 'id_jabatan';
    protected $fillable = ['id_jabatan', 'nama_jabatan'];
    public $incrementing = false;
    public $timestamps = false;

    public function pegawai(){
        return $this->hasMany(DataPegawai::class);
    }
}
