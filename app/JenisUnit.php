<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisUnit extends Model
{
    protected $primaryKey = 'id_jenis_unit';
    protected $fillable = ['id_jenis_unit','nama_jenis_unit',];
    public $incrementing = false;
    public $timestamps = false;

    public function unit(){
        return $this->hasMany(Unit::class);
    }
 
}
