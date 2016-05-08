<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatecuentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreCuenta');
            $table->string('numero_cuenta');
            $table->double('recursos');
            $table->string('descripcion')->unique();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cuenta');
    }
}
