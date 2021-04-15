<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationToDetailPengecekanTi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_pengecekan_tis', function (Blueprint $table) {
            $table->foreign(['no_seri', 'tgl_pengecekan', 'nip_pegawai'])->references(['no_seri', 'tgl_pengecekan','nip_pegawai'])->on('pengecekan_aset_tis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('no_seri')->references('no_seri')->on('pengecekan_aset_tis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('os_id')->references('id_os')->on('oss')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_master_ti')->references('id_master_ti')->on('master_aset_tis')->onDelete('cascade')->onUpdate('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_pengecekan_ti', function (Blueprint $table) {
            //
        });
    }
}
