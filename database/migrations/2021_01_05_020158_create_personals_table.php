<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->integer('num_externo')->nullable();
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('nombres');
            $table->string('RFC')->nullable();
            $table->string('curp');
            $table->string('correo_electronico')->nullable();
            $table->string('foto')->nullable();
            //documentos
            $table->string('alta_seguro_social')->nullable();
            $table->string('baja_seguro_social')->nullable();
            $table->string('identificacion')->nullable();
            $table->string('constancia_de_retencion_infonavit')->nullable();
            $table->string('comprobante_domiciliario')->nullable();
            $table->timestamps();
        });
        //then set autoincrement to 1000
       //after creating the table
       DB::update("ALTER TABLE personals AUTO_INCREMENT = 10000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personals');
    }
}
