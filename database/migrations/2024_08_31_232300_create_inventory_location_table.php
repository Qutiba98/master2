<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryLocationTable extends Migration
{
    /**
     * 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_locations', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->enum('type', ['local', 'global']); 
            $table->string('status')->nullable(); 
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
        Schema::dropIfExists('inventory_locations');
    }
}
