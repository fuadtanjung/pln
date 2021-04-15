<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ruangans extends Migration
{
    
    public function up()
    {
        Schema::create('ruangans', function (Blueprint $table) {
            $table->string('id_ruangan', 5);
            $table->string('unit_id', 5);
            $table->string('nama_ruangan', 30);
           
            
            $table->timestamp('failed_at')->useCurrent();
            $table->primary('id_ruangan', 5);
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    
    public function down()
    {
        //
    }
}
