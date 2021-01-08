<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->string('control_de_vacaciones')->nullable();
            $table->string('fonacot');
            $table->integer('fonacot_importe_mensual');
            $table->unsignedBigInteger('sucursal_bancaria_id')->nullable();
            $table->string('clave_interbancaria');
            $table->timestamps();

            $table->foreign('empleado_id')
            ->references('id')
            ->on('personals')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('sucursal_bancaria_id')
            ->references('id')
            ->on('instituciones_bancarias')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
