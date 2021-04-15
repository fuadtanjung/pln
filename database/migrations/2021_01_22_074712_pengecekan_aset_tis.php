<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PengecekanAsetTis extends Migration
{
    
    public function up()
    {
        Schema::create('pengecekan_aset_tis', function(Blueprint $table){
            $table->string('no_seri', 10);
            $table->date('tgl_pengecekan');
            $table->string('nip_pegawai',20);
            $table->string('nip_petugas',20);

            $table->timestamp('failed_at')->useCurrent();
            $table->primary((['no_seri','tgl_pengecekan','nip_pegawai']));
            $table->foreign('nip_pegawai')->references('nip_pegawai')->on('pegawais')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nip_petugas')->references('nip_petugas')->on('petugass')->onDelete('cascade')->onUpdate('cascade');

                                                                                                                                 
        });
    }

    
    public function down()
    {
        //
    }
}
