     <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('activos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inventarios_id');
            $table->integer('clasesPUC_id');
            $table->integer('aniosUso');
            $table->integer('vidaUtil');
            $table->double('depreciacion', 15, 2);
            $table->string('descripcion');
            $table->string('cuenta');
            $table->timestamps();
            $table->foreign('inventarios_id')->references('id')->on('inventario');
            $table->foreign('clasesPUC_id')->references('id')->on('clasesPUC');
        });
    }
    public function down()
    {
        Schema::drop('password_resets');
    }
}