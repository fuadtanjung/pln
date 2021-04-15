<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailAsetTi extends Model
{
    use \Awobaz\Compoships\Compoships;

    protected $table = 'detail_pengecekan_tis';
    protected $primaryKey = ['no_seri', 'tgl_pengecekan', 'nip_pegawai'];
    protected $fillable = ['no_seri', 'tgl_pengecekan', 'nip_pegawai','id_master_ti',
    'tahun_aset','os_id','lisensi','cpu_merek', 'monitor_merek','kondisi', 'status', 'serial_number',
    'ip_address','mac_address','kapasitas_memori','processor_merek','kapasitas_processor','vga_tipe',
    'vga_kapasitas','hdd_kapasitas'];
    public $incrementing = false;
    public $timestamps = false;

    public function pengecekan_aset()
    {
        return $this->belongsTo('App\PengecekanAsetTi',['no_seri','tgl_pengecekan','nip_pegawai'],['no_seri','tgl_pengecekan','nip_pegawai']);
    }
    public function master_aset_ti(){
        return $this->belongsTo(MasterAsetTi::class, 'id_master_ti', 'id_master_ti');
    }
    public function os(){
        return $this->belongsTo(Os::class, 'os_id', 'id_os');
    }
    public function pegawai(){
        return $this->belongsTo(DataPegawai::class, 'nip_pegawai', 'nip_pegawai');
    }
}
