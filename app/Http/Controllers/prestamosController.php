<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prestamos;
use App\Models\institucionesBancarias;
use App\Models\personal;
use Illuminate\Support\Facades\DB;

class prestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos = personal::select(
            'personals.id as empleado_id',
            DB::raw("CONCAT(personals.apellido_paterno, ' ', personals.apellido_materno, ' ', personals.nombres) as nombres"),
            'prestamos.fonacot as fonacot',
            'prestamos.fonacot_importe_mensual as fonacot_importe_mensual',
            'prestamos.clave_interbancaria as clave_interbancaria',
            'instituciones_bancarias.nombre_de_institucion as sucursal_bancaria'
        )
        ->leftJoin('prestamos', 'personals.id', '=', 'prestamos.empleado_id')
        ->leftJoin('instituciones_bancarias', 'prestamos.sucursal_bancaria_id', '=', 'instituciones_bancarias.id')
        ->orderBy('personals.id','DESC')
        ->paginate(4);
        return view('prestamos.index', compact('prestamos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $empleado = personal::select(
            DB::raw("CONCAT(apellido_paterno, ' ', apellido_materno, ' ', nombres) as nombres"),
            'id')->where('id', $id)->first();
            $sucursal_bancaria = institucionesBancarias::all();
        return view('prestamos.create', compact('empleado','sucursal_bancaria'));

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
            'empleado_id' => 'required|max:25|string',
            'fonacot' => 'required|string',
            'fonacot_importe_mensual' => 'integer',
            'clave_interbancaria' => 'required|integer',
        ],
            [
                'empleado_id.required' => 'Id de empleado no puede quedar vacio:(',
                'fonacot.required' => 'fonacot vacio :(',
                'fonacot_importe_mensual.integer' => 'El importe debe ser número :(',
                'clave_interbancaria.integer' => 'La clave interbancaria debe ser números',
                'clave_interbancaria.required' => 'Es necesario escribir la clave interbancaria',
               
            ]);

               

                $prestamos = new prestamos();
                $prestamos->empleado_id = $request->input('empleado_id');
                $prestamos->control_de_vacaciones = $request->input('control_de_vacaciones');
                $prestamos->fonacot = $request->input('fonacot');
                $prestamos->fonacot_importe_mensual = $request->input('fonacot_importe_mensual');
                $prestamos->sucursal_bancaria_id = $request->input('sucursal_bancaria_id');
                $prestamos->clave_interbancaria = $request->input('clave_interbancaria');
                $prestamos->save();
        
           
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
