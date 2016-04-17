     <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->integer('elemento_id');
            $table->integer('grupo_id');
            $table->integer('dependencia_id') ;
            $table->double('valorUnitario', 15, 2);
            $table->double('valorTotal', 15, 2);
            $table->integer('estado');
            $table->integer('donacion');
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