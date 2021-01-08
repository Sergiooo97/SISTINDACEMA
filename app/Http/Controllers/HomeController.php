<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personal;
use App\Models\institucionesBancarias;
use App\Models\status;
use App\Models\historialLaboral;
use App\Models\prestamos;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $infPersonal = personal::select(
            'personals.id as id',
            DB::raw("CONCAT(apellido_paterno, ' ', apellido_materno, ' ', nombres) as nombres"),
            'personals.RFC as RFC',
            'historial_laborals.fecha_ingreso_a_empresa as fecha_ingreso_a_empresa',
            'catalogo_puestos.nombre as puesto',
            'catalogo_registro_patronals.nombre as rp',
            'instituciones_bancarias.nombre_de_institucion as sucursal_bancaria',
            'statuses.id as status_id',
            )
            ->leftJoin('historial_laborals', 'personals.id', '=', 'historial_laborals.empleado_id')
            ->leftJoin('prestamos', 'personals.id', '=', 'prestamos.empleado_id')
            ->leftJoin('catalogo_puestos', 'historial_laborals.puesto_id', '=', 'catalogo_puestos.id')
            ->leftJoin('statuses', 'historial_laborals.status_id', '=', 'statuses.id')
            ->leftJoin('proyectos', 'historial_laborals.departamento_proyecto_id', '=', 'proyectos.id')
            ->leftJoin('catalogo_registro_patronals', 'historial_laborals.reg_patronal_perteneciente_id', '=', 'catalogo_registro_patronals.id')
            ->leftJoin('instituciones_bancarias', 'prestamos.sucursal_bancaria_id', '=', 'instituciones_bancarias.id')
            ->get();
        return view('home', compact('infPersonal'));
    }
}
