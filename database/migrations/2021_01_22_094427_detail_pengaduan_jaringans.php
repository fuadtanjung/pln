<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPengaduanJaringans extends Migration
{

    public function up()
    {
        Schema::create('detail_pengaduan_jaringans', function(Blueprint $table){
            $table->string('id_pengaduan_jaringan', 5);
            $table->string('id_master_jaringan', 5);
            $table->string('status_pengaduan', 10);
            $table->text('keterangan');
            $table->string('foto', 30);
            $table->text('tanggapan')->nullable();


            $table->timestamp('failed_at')->useCurrent();
            $table->primary('id_pengaduan_jaringan');

        });
    }


    public function down()
    {
        //
    }
}
