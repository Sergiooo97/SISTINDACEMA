<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\controlVacaciones;
use App\Models\personal;
class vacacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacaciones = personal::select(
            'control_vacaciones.num_periodo as num_periodo',
            'control_vacaciones.periodo_perteneciente as periodo_perteneciente',
            'control_vacaciones.dias_vacaciones as dias_vacaciones',
            'control_vacaciones.fecha_inicial as fecha_inicial',
            'control_vacaciones.fecha_final as fecha_final',
            'personals.id as empleado_id',
            'personals.nombres as nombres'
        )
        ->leftJoin('control_vacaciones', 'personals.id', '=', 'control_vacaciones.empleado_id')
        ->get();
        return view('vacaciones.index', compact('vacaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $personals = personal::find($id)->first();
        return view('vacaciones.create', compact('personals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $controlVacaciones = new controlVacaciones;
        $controlVacaciones->empleado_id = $request->input('empleado_id');
        $controlVacaciones->num_periodo = $request->input('num_periodo');
        $controlVacaciones->periodo_perteneciente = $request->input('periodo_perteneciente');
        $controlVacaciones->dias_vacaciones = $request->input('dias_vacaciones');
        $controlVacaciones->fecha_inicial = $request->input('fecha_inicial');
        $controlVacaciones->fecha_final = $request->input('fecha_final');
        $controlVacaciones->dias_disfrutados = $request->input('dias_disfrutados');
        $controlVacaciones->dias_por_disfrutar = $request->input('dias_por_disfrutar');
        $controlVacaciones->save();






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
