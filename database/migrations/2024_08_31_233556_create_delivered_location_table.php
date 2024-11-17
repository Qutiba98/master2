<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveredLocationTable extends Migration
{
    /**
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivered_location', function (Blueprint $table) {
            $table->id(); 
            $table->string('address1'); 
            $table->string('address2')->nullable(); 
            $table->string('city'); 
            $table->integer('postal_code'); 
            $table->string('name'); 
            $table->integer('status_id'); 

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
        Schema::dropIfExists('delivered_location');
    }
}
