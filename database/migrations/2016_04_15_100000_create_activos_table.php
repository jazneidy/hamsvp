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
            $table->integer('elemento_id');
            $table->integer('aniosUso');
            $table->integer('vidaUtil');
            $table->double('depreciacion', 15, 2);
            $table->string('descripcion');
            $table->timestamps();
            $table->foreign('elemento_id')->references('id')->on('elementos');
        });
    }
    public function down()
    {
        Schema::drop('password_resets');
    }
}