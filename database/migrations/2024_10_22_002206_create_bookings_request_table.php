<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsRequestTable extends Migration
{
    public function up()
    {
        Schema::create('bookings_request', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_type_id')->constrained()->onDelete('cascade');
            $table->string('duration');
            $table->decimal('price', 10, 2);
            $table->string('country'); 
            $table->string('status')->default('pending'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings_request');
    }
}
