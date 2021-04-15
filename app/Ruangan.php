<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Ruangan extends Model
{
   
    protected $primaryKey = 'id_ruangan';
    protected $table = 'ruangans';
    protected $fillable = ['id_ruangan','unit_id','nama_ruangan'];
    public $incrementing = false;
    public $timestamps = false;

    public function master_aset_jaringan(){
        return $this->hasMany(MasterAsetJaringan::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id_unit');
    }

    use AutoNumberTrait;
    public function getAutoNumberOptions(){
     return [
         'id_ruangan' => [
             'format' => 'R-?', // Format kode yang akan digunakan.
             'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
         ]
     ];
    }
}
