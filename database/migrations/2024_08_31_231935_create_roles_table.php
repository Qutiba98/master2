<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->timestamps(); 
        });

        DB::table('roles')->insert([
            ['name' => 'user'],
            ['name' => 'admin'],
            ['name' => 'super admin'],
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
