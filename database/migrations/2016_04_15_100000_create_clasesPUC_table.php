     <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasesPUCTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ClasesPUC', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->index();
            $table->string('nombreCuenta')->index();
            $table->string('naturaleza')->index();
            $table->string('beneficiario')->index();
            $table->string('descripcion')->index();
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
        Schema::drop('ClasesPUC');
    }
} 