<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pegawais extends Migration
{
    
    public function up()
    {
        Schema::create('pegawais', function(Blueprint $table){
            $table->string('nip_pegawai', 20);
            $table->string('unit_id', 5);
            $table->string('jabatan_id', 5);
            $table->string('nama_pegawai',30);
            $table->text('alamat_pegawai');
            $table->string('no_hp',15);

            $table->timestamp('failed_at')->useCurrent();
            $table->primary('nip_pegawai',20);
            $table->foreign('nip_pegawai')->references('nip')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jabatan_id')->references('id_jabatan')->on('jabatans')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
