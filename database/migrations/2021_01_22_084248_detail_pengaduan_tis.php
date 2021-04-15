<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPengaduanTis extends Migration
{

    public function up()
    {
        Schema::create('detail_pengaduan_tis', function(Blueprint $table){
            $table->string('id_pengaduan_ti', 5);
            $table->string('id_master_ti',5);
            $table->string('status_pengaduan', 10);
            $table->text('keterangan');
            $table->string('foto', 30);
            $table->text('tanggapan')->nullable();

            $table->timestamp('failed_at')->useCurrent();
            $table->primary('id_pengaduan_ti');
            $table->foreign('id_master_ti')->references('id_master_ti')->on('master_aset_tis')->onDelete('cascade')->onUpdate('cascade');

        });
    }


    public function down()
    {

    }
}
