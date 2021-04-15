<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPengecekanJaringans extends Migration
{
    
    public function up()
    {
        Schema::create('detail_pengecekan_jaringans', function(Blueprint $table){
            $table->string('no_seri', 10);
            $table->date('tgl_pengecekan');
            $table->string('id_master_jaringan', 5);
            $table->string('nip_petugas',20);
            $table->string('tipe',30);
            $table->enum('kondisi',['Baik', 'Buruk']);

            $table->timestamp('failed_at')->useCurrent();
            $table->primary(['no_seri','tgl_pengecekan']);
            $table->foreign('id_master_jaringan')->references('id_master_jaringan')->on('master_aset_jaringans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nip_petugas')->references('nip_petugas')->on('petugass')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    
    public function down()
    {
       
    }
}
