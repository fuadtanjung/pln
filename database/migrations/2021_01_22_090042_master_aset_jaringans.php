<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterAsetJaringans extends Migration
{
    
    public function up()
    {
        Schema::create('master_aset_jaringans', function(Blueprint $table){
            $table->string('id_master_jaringan',5);
            $table->string('ruangan_id',5);
            $table->string('jenis_aset_id',5);
            $table->string('nama_master_jaringan', 50);
            
            $table->timestamp('failed_at')->useCurrent();
            $table->primary('id_master_jaringan');
            
            $table->foreign('ruangan_id')->references('id_ruangan')->on('ruangans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_id')->references('id_jenis_aset')->on('jenis_asets')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    
    public function down()
    {
        //
    }
}
