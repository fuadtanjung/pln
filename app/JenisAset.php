<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class JenisAset extends Model
{
    protected $primaryKey = 'id_jenis_aset';
    protected $fillable = ['id_jenis_aset','nama_jenis_aset'];
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function master_aset_ti(){
        return $this->hasMany(MasterAsetTi::class);
    }
    public function master_aset_jaringan(){
        return $this->hasMany(MasterAsetJaringan::class);
    }
    
    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_jenis_aset' => [
                'format' => 'AS-?', // Format kode yang akan digunakan.
                'length' => 2 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }

}


