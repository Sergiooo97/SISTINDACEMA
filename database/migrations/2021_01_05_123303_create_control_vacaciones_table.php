<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlVacacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_vacaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->integer('num_periodo');
            $table->string('periodo_perteneciente');
            $table->integer('dias_vacaciones');
            $table->date('fecha_inicial');
            $table->date('fecha_final');
            $table->integer('dias_disfrutados');
            $table->integer('dias_por_disfrutar');
            $table->timestamps();
            $table->foreign('empleado_id')
            ->references('id')
            ->on('personals')
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
        Schema::dropIfExists('control_vacaciones');
    }
}
