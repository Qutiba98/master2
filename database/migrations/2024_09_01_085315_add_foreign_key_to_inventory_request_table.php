<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToInventoryRequestTable extends Migration
{
    /**
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory_request', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // $table->foreign('delivered_location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory_request', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id'); 
        });
    }
}
