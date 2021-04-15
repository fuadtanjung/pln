<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PengaduanAsetTis extends Migration
{
    
    public function up()
    {
        Schema::create('pengaduan_aset_tis', function(Blueprint $table){
            $table->string('id_pengaduan_ti', 5);
            $table->string('nip_pegawai', 20);
            $table->date('tgl_pengaduan');

            $table->timestamp('failed_at')->useCurrent();
            $table->primary('id_pengaduan_ti');
            $table->foreign('nip_pegawai')->references('nip_pegawai')->on('pegawais')->onDelete('cascade')->onUpdate('cascade');

        });
    }

   
    public function down()
    {
        //
    }
}
