<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterAsetTis extends Migration
{
    
    public function up()
    {
       Schema::create('master_aset_tis', function(Blueprint $table){
        $table->string('id_master_ti', 5);
        $table->string('jenis_aset_id', 5);
        $table->string('nip_pegawai', 20);
        $table->string('nama_master_ti', 50);


        $table->timestamp('failed_at')->useCurrent();
        $table->primary('id_master_ti', 5);
        $table->foreign('jenis_aset_id')->references('id_jenis_aset')->on('jenis_asets')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('nip_pegawai')->references('nip_pegawai')->on('pegawais')->onDelete('cascade')->onUpdate('cascade');

       });
    }

    
    public function down()
    {
        //
    }
}
