<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestamos extends Model
{
    use HasFactory;
    protected $fillable = [
        'control_de_vacaciones','fonacot','fonacot_importe_mensual',
        'sucursal_bancaria','clave_interbancaria',
       
    ];
}
