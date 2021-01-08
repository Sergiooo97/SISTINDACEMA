<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historialLaboral extends Model
{
    protected $fillable = [
        'puesto','reg_patronal_perteneciente','salario_diario_imss',
        'descuento_infonavit','fecha_baja_seguro_social','sueldo_diario',
        'departamento','estado','zona','fecha_ingreso_a_empresa','num_seguro_social',
        'fecha_alta_seguro_social'
    ];

    use HasFactory;
}
