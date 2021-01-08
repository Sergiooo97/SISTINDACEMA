<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialLaboralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_laborals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->unsignedBigInteger('puesto_id')->nullable();
            $table->unsignedBigInteger('reg_patronal_perteneciente_id')->nullable();
            $table->unsignedBigInteger('departamento_proyecto_id')->nullable();
            $table->string('salario_diario_imss')->nullable();
            $table->string('descuento_infonavit')->nullable();
            $table->string('fecha_de_baja')->nullable();
            $table->string('sueldo_diario');
            $table->string('estado')->nullable();
            $table->string('zona')->nullable();
            $table->string('fecha_ingreso_a_empresa')->nullable();
            $table->string('num_seguro_social')->nullable();
            $table->string('fecha_alta_seguro_social')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->timestamps();
            //Relaciones
            $table->foreign('status_id')
            ->references('id')
            ->on('statuses')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('departamento_proyecto_id')
            ->references('id')
            ->on('proyectos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('reg_patronal_perteneciente_id')
            ->references('id')
            ->on('catalogo_registro_patronals')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('empleado_id')
            ->references('id')
            ->on('personals')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('puesto_id')
            ->references('id')
            ->on('catalogo_puestos')
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
        Schema::dropIfExists('historial_laborals');
    }
}
