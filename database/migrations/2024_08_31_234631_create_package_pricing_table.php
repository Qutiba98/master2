<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagePricingTable extends Migration
{
    /**
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_pricing', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('package_type_id'); 
            $table->string('duration'); 
            $table->decimal('price', 10, 2); 

            $table->foreign('package_type_id')
                  ->references('id')
                  ->on('package_types')
                  ->onDelete('cascade'); 

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
        Schema::dropIfExists('package_pricing');
    }
}
