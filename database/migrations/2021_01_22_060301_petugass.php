<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Petugass extends Migration
{
    
    public function up()
    {
        Schema::create('petugass', function (Blueprint $table){
            $table->string('nip_petugas', 20);
            $table->string('unit_id', 5);
            $table->string('nama_petugas', 30);
            $table->text('alamat_petugas');
            
            $table->timestamp('failed_at')->useCurrent();
            $table->primary('nip_petugas',20);
            $table->foreign('nip_petugas')->references('nip')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    
    public function down()
    {
        
    }
}
