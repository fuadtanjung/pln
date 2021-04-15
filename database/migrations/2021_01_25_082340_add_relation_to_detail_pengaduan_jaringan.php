<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationToDetailPengaduanJaringan extends Migration
{
    
    public function up()
    {
        Schema::table('detail_pengaduan_jaringans', function (Blueprint $table) {
            $table->foreign('id_pengaduan_jaringan')->references('id_pengaduan_jaringan')->on('pengaduan_jaringans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_master_jaringan')->references('id_master_jaringan')->on('master_aset_jaringans')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    
    public function down()
    {
        Schema::table('detail_pengaduan_jaringans', function (Blueprint $table) {
            //
        });
    }
}
