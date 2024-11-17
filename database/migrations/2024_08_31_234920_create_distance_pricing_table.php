<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistancePricingTable extends Migration
{
    /**
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distance_pricing', function (Blueprint $table) {
            $table->id(); 
            $table->integer('postal_code_from'); 
            $table->integer('postal_code_to'); 
            $table->decimal('distance', 10, 2); 
            $table->decimal('price', 10, 2); 

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
        Schema::dropIfExists('distance_pricing');
    }
}
