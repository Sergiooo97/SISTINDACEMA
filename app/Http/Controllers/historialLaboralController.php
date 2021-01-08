<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\historialLaboral;
use Alert;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\catalogoPuestos;
use App\Models\catalogoRegistroPatronal;
use App\Models\proyecto;
use App\Models\personal;

class historialLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historialLaboral = personal::select(
            'personals.id as empleado_id',
            'historial_laborals.salario_diario_imss as salario_d',
            'historial_laborals.descuento_infonavit as descuento_infonavit',
            'historial_laborals.fecha_de_baja as fecha_baja',
            'historial_laborals.sueldo_diario as sueldo_diario',
            'historial_laborals.fecha_ingreso_a_empresa as ingreso_a_empresa',
            'proyectos.nombre as proyecto',
            'personals.nombres as nombre_persona',
            'catalogo_puestos.nombre as puesto',
            'catalogo_registro_patronals.nombre as rp'
        )
        ->leftJoin('historial_laborals', 'personals.id', '=', 'historial_laborals.empleado_id')
        //->leftJoin('personals', 'historial_laborals.empleado_id', '=', 'personals.id')
        ->leftJoin('proyectos', 'historial_laborals.departamento_proyecto_id', '=', 'proyectos.id')
        ->leftJoin('catalogo_puestos', 'historial_laborals.puesto_id', '=', 'catalogo_puestos.id')
        ->leftJoin('catalogo_registro_patronals', 'historial_laborals.reg_patronal_perteneciente_id', '=', 'catalogo_registro_patronals.id')
        ->orderBy('empleado_id','DESC')
        ->paginate(4);
        return view('historialLaboral.index', compact('historialLaboral'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $nombres = $request->get('nombres');

        $proyectos = proyecto::all();
        $puestos = catalogoPuestos::all();
        $rps = catalogoRegistroPatronal::all();
        $personals = personal::select(
            'personals.id as id',
            'personals.nombres as nombres'
        )->nombres($nombres)->paginate(1);

        $empleado = personal::select(
            DB::raw("CONCAT(apellido_paterno, ' ', apellido_materno, ' ', nombres) as nombres"),
            'id')->where('id', $id)->first();

        return view('historialLaboral.create', compact('puestos', 'rps', 'proyectos', 'personals', 'empleado'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validation
        $request->validate([
            'empleado_id' => 'integer|required',
            'puesto_id' => 'required',
            'reg_patronal_perteneciente_id' => 'required',
            'departamento_proyecto_id' => 'required',
            'salario_diario_imss' => 'integer',
            'descuento_infonavit' => 'string',
            'sueldo_diario' => 'required|integer',
            'estado' => 'string',
            'fecha_ingreso_a_empresa' => 'required',
            'num_seguro_social' => 'integer',

        ],
            [
                'empleado_id.required' => 'debe registrar id de empleado:(',
                'empleado_id.integer' => 'El id de empleado debe ser número',
                'puesto_id.required' => 'debe registrar un puesto :(',
                'reg_patronal_perteneciente_id.required' => 'debe seleccionar un registro patronal :(',

                'departamento_proyecto_id.required' => 'Es necesario seleccionar un proyecto o departamento:(',
                'salario_diario_imss.integer' => 'El salario debe ser numeros :(',
                'descuento_infonavit.string' => 'Seleccione una opcion en descuento infonavit :(',
                'sueldo_diario.required' => 'Es necesario registrar el sueldo diario :(',
                'estado.string' => 'solo es posible escribir numeros para el numero externo',
                'fecha_ingreso_a_empresa.required' => 'Es necesario escribir fecha de ingreso a empresa',
            ]);

               
                $historialLaboral = new historialLaboral();
                
                $historialLaboral->empleado_id = $request->input('empleado_id');
                $historialLaboral->puesto_id = $request->input('puesto_id');
                $historialLaboral->reg_patronal_perteneciente_id = $request->input('reg_patronal_perteneciente_id');
                $historialLaboral->departamento_proyecto_id = strtoupper($request->input('departamento_proyecto_id'));
                $historialLaboral->salario_diario_imss = $request->input('salario_diario_imss');
                $historialLaboral->descuento_infonavit = $request->input('descuento_infonavit');
                $historialLaboral->fecha_de_baja = $request->input('fecha_de_baja');
                $historialLaboral->sueldo_diario = $request->input('sueldo_diario');
                $historialLaboral->estado = strtoupper($request->input('estado'));
                $historialLaboral->zona = strtoupper($request->input('zona'));
                $historialLaboral->fecha_ingreso_a_empresa = $request->input('fecha_ingreso_a_empresa');
                $historialLaboral->num_seguro_social = $request->input('num_seguro_social');
                $historialLaboral->fecha_alta_seguro_social = $request->input('fecha_alta_seguro_social');
                $historialLaboral->status_id = "1";

                $historialLaboral->save();
                                  
                                    
                
                     
                          
                          
                                
                                
                                       
                                         
                      
                            
                     
             
           
                return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
