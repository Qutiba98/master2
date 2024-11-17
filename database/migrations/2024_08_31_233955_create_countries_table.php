<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * 
     *
     * @return void
     */
    public function up()
    {
Schema::create('countries', function (Blueprint $table) {
    $table->id(); 
    $table->string('name')->unique(); 
    $table->string('code', 10)->unique(); 
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
        Schema::dropIfExists('countries');
    }
}
