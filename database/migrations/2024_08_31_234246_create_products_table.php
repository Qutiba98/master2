<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('inventory_id'); 
            $table->string('name'); 
            $table->string('size'); 
            $table->string('space_required'); 

            $table->foreign('inventory_id')->references('id')->on('inventory')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
