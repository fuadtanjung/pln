<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Units extends Migration
{
    
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->string('id_unit', 5);
            $table->string('jenis_id', 5);
            $table->string('nama_unit', 50);
            $table->text('alamat_unit');
            
            $table->timestamp('failed_at')->useCurrent();
            $table->primary('id_unit');
            $table->foreign('jenis_id')->references('id_jenis_unit')->on('jenis_units')->onDelete('cascade')->onUpdate('cascade');
        
        });
    }

    
    public function down()
    {
        
    }
}
