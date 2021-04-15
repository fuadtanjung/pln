<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPengecekanTis extends Migration
{
   
    public function up()
    {
        Schema::create('detail_pengecekan_tis', function(Blueprint $table){
            $table->string('no_seri', 10);
            $table->date('tgl_pengecekan');
            $table->string('nip_pegawai',20);
            $table->string('id_master_ti',20);
            $table->year('tahun_aset');
            $table->string('os_id', 5);
            $table->enum('lisensi', ['Ya', 'Tidak']);
            $table->string('cpu_merek', 30);
            $table->string('monitor_merek', 30);
            $table->enum('kondisi',['Baik', 'Buruk']);
            $table->enum('status', ['sewa', 'milik']);
            $table->string('serial_number', 30);
            $table->string('ip_address', 30);
            $table->string('mac_address', 30);
            $table->string('kapasitas_memori', 30);
            $table->string('processor_merek', 30);
            $table->string('kapasitas_processor', 30);
            $table->string('vga_tipe', 30);
            $table->string('vga_kapasitas', 30);
            $table->string('hdd_kapasitas', 30);

            $table->timestamp('failed_at')->useCurrent();
            $table->primary(['no_seri','tgl_pengecekan','nip_pegawai']);
            // $table->foreign('no_seri')->references('no_seri')->on('pengecekan_aset_ti')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('os_id')->references('id')->on('os')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_master_ti')->references('id_master_ti')->on('master_aset_ti')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    
    public function down()
    {
        //
    }
}
