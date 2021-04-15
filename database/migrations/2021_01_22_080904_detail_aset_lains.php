<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailAsetLains extends Migration
{
    
    public function up()
    {
        Schema::create('detail_aset_lains', function(Blueprint $table){
            $table->string('no_seri', 10);
            $table->date('tgl_pengecekan');
            $table->string('nip_pegawai',20);
            $table->string('id_master_ti', 5);
            $table->string('tipe', 30);
            $table->boolean('kondisi');

            $table->timestamp('failed_at')->useCurrent();
            $table->primary((['no_seri','tgl_pengecekan','nip_pegawai']));
            $table->foreign(['no_seri', 'tgl_pengecekan', 'nip_pegawai'])->references(['no_seri', 'tgl_pengecekan','nip_pegawai'])->on('pengecekan_aset_tis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_master_ti')->references('id_master_ti')->on('master_aset_tis')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

  
    public function down()
    {
        //
    }
}
