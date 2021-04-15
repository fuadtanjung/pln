<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [ 'nip','role_id','username','email','password'];
    protected $primaryKey = 'nip';
    public $incrementing = false;
    public $timestamps = false;
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'id_role');
    }
    public function pegawai(){
        return $this->hasOne(DataPegawai::class, 'nip_pegawai', 'nip');
    }
    public function petugas(){
        return $this->hasOne(Petugas::class, 'nip_petugas', 'nip');
    }

}
