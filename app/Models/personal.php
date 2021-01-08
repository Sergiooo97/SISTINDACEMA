<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class personal extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_externo','nombres','apellido_paterno',
        'apellido_materno','RFC','correo_electronico',
        'curp','foto','alta_seguro_social','baja_seguro_social','tabla_control_dias_de_vacaciones',
        'identificacion','constancia_de_retencion_infonavit', 'comprobante_domiciliario',
       
    ];


    public function scopeNombres($query, $nombres){
        if($nombres)
        return $query->where('nombres', 'LIKE', "%$nombres%" );
    }
    public function scopeGrado($query, $grado){
        if($grado)
        return $query->where('alumnos.grado', 'LIKE', "%$grado%" );
    }
    public function scopeGrupo($query, $grupo){
        if($grupo)
        return $query->where('alumnos.grupo_id', 'LIKE', "%$grupo%" );
    }

    public static function setCaratula($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("imagenes/caratulas/$actual");
            }
            $imageName = Str::random(20) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("imagenes/foto/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }
    
}
