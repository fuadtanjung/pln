<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Oss extends Migration
{
    
    public function up()
    {
        Schema::create('oss', function (Blueprint $table) {
            $table->string('id_os', 5);
            $table->string('nama_os', 30);
           
            $table->timestamp('failed_at')->useCurrent();

            $table->primary('id_os');
        });
    }

    
    public function down()
    {
       
    }
}
