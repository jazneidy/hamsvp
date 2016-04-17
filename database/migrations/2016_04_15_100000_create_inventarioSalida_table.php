     <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarioSalida', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad_actual');
            $table->integer('elemento_id');
            $table->integer('grupo_id');
            $table->integer('dependencia_id') ;
            $table->double('valorUnitario', 15, 2);
            $table->String('estado');
            $table->integer('donacion');
            $table->integer('cantidad_salida');
            $table->timestamps();
            $table->foreign('elemento_id')->references('id')->on('elementos');
            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->foreign('dependencia_id')->references('id')->on('dependencias');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_resets');
    }
}