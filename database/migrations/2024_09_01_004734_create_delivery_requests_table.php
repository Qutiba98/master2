<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryRequestsTable extends Migration
{
    /**
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_requests', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('delivery_type_id'); 
            $table->unsignedBigInteger('pickup_location_id'); 
            $table->unsignedBigInteger('nationality_status_id');
            $table->unsignedBigInteger('delivered_location_id'); 
            $table->string('name'); 
            $table->integer('status_id'); 
            $table->unsignedBigInteger('country_id')->nullable(); 

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('delivered_location_id')->references('id')->on('delivered_location')->onDelete('cascade');
            $table->foreign('nationality_status_id')->references('id')->on('nationality_status')->onDelete('cascade');
            $table->foreign('pickup_location_id')->references('id')->on('pickup_location')->onDelete('cascade'); 
            $table->foreign('delivery_type_id')->references('id')->on('delivery_type')->onDelete('cascade'); 

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
        Schema::table('delivery_requests', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['delivered_location_id']);
            $table->dropForeign(['nationality_status_id']);
            $table->dropForeign(['pickup_location_id']);
            $table->dropForeign(['delivery_type_id']); 
        });

        Schema::dropIfExists('delivery_requests');
    }
}
