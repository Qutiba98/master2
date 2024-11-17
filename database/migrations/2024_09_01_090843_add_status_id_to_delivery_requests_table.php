<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusIdToDeliveryRequestsTable extends Migration
{
    /**
     * 
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->change(); 

            $table->foreign('status_id')->references('id')->on('request_status')->onDelete('cascade');
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
            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');
        });
    }
}
