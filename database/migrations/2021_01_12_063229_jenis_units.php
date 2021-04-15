<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JenisUnits extends Migration
{
    
    public function up()
    {
        Schema::create('jenis_units', function (Blueprint $table) {
            $table->string('id_jenis_unit', 5);
            $table->string('nama_jenis_unit',30);
            $table->timestamp('failed_at')->useCurrent();

            $table->primary('id_jenis_unit');
        });
    }

    
    public function down()
    {
        
    }
}
