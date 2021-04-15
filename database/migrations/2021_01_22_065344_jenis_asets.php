<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JenisAsets extends Migration
{
    
    public function up()
    {
        Schema::create('jenis_asets', function (Blueprint $table){
            $table->string('id_jenis_aset',5);
            $table->string('nama_jenis_aset', 30);

            $table->timestamp('failed_at')->useCurrent();
            $table->primary('id_jenis_aset', 5);
            
        });
    }

    
    public function down()
    {
        //
    }
}
