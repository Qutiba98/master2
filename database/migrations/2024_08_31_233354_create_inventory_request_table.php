<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryRequestTable extends Migration
{
    /**
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_request', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('package_id'); 
            $table->integer('nationality_status_id');
            $table->bigInteger('delivered_location_id'); 
            $table->string('name'); 
            $table->integer('status_id');

            // تعريف العلاقة بين user_id و users
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('inventory_request');
    }
}
