<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PengaduanJaringans extends Migration
{
    
    public function up()
    {
        Schema::create('pengaduan_jaringans', function(Blueprint $table){
            $table->string('id_pengaduan_jaringan', 5);
            $table->string('unit_id', 5);
            $table->date('tgl_pengaduan');

            $table->timestamp('failed_at')->useCurrent();
            $table->primary('id_pengaduan_jaringan');
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    
    public function down()
    {
        
    }
}
