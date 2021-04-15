<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Roles extends Migration
{
    
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id_role', 2);
            $table->string('nama_role', 30);
            $table->timestamp('failed_at')->useCurrent();

        });

    }

    
    public function down()
    {
        
    }
}
