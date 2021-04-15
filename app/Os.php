<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Os extends Model
{
    protected $primaryKey = 'id_os';
    protected $table = 'oss';
    protected $fillable = ['id_os','nama_os'];
    public $incrementing = false;
    public $timestamps = false;

    public function detail_aset_ti(){
        return $this->hasMany(DetailAsetTi::class);
    }
}

