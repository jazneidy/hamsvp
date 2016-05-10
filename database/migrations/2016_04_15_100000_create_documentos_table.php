     <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->increments('id'); 
            $table->double('total', 15, 2); 
            $table->String('tipo_doc'); 
            $table->timestamps();
            
        });
        Schema::create('cuenta_doc', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('codigoCuenta');
            $table->String('nombre_cuenta');
            $table->double('debe', 15, 2);
            $table->double('haber', 15, 2);
            $table->String('beneficiario');
            $table->integer('documento_id');
            $table->timestamps();
            $table->foreign('documento_id')->references('id')->on('documento'); 
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