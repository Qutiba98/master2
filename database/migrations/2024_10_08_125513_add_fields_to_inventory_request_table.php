<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToInventoryRequestTable extends Migration
{
    public function up()
    {
        Schema::table('inventory_request', function (Blueprint $table) {
            $table->string('governorate');
            $table->text('housing_details');
            $table->string('number')->unique()->nullable();
            $table->string('size');
            $table->string('breakable');
            $table->string('delivery_service');
            $table->text('message')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('storage_duration');
            $table->decimal('total_price', 10, 2)->nullable();
            $table->date('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')
                  ->references('location_id')->on('inventory')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('inventory_request', function (Blueprint $table) {
            if (Schema::hasColumn('inventory_request', 'location_id')) {
                $table->dropForeign(['location_id']);
                $table->dropColumn('location_id');
            }

            $table->dropColumn([
                'governorate',
                'housing_details',
                'number',
                'size',
                'breakable',
                'delivery_service',
                'payment_method',
                'message',
                'storage_duration',
                'total_price',
                'start_date',
                'end_date'
            ]);
        });
    }
}
