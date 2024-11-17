<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->unsignedBigInteger('location_id'); 
            $table->unsignedInteger('total_space'); 

            // إضافة المفتاح الخارجي
            $table->foreign('location_id')
                ->references('id')->on('inventory_locations') 
                ->onDelete('cascade'); 

            $table->unsignedInteger('space'); // Space should be integer, not string
            $table->timestamps(); 
        });
    }

    /**
     * التراجع عن التهجير.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
