<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalityStatusTable extends Migration
{
    /**
     * 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationality_status', function (Blueprint $table) {
            $table->id(); 
            $table->integer('local'); 
            $table->string('status'); 

            $table->timestamps(); 
        });
    }

    /**
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nationality_status');
    }
}
