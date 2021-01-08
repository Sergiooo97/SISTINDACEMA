<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personal;
use App\Models\institucionesBancarias;
use App\Models\status;
use App\Models\historialLaboral;
use App\Models\prestamos;

use Alert;
use App\Models\documento;
use Illuminate\Support\Facades\Storage;

class personalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infPersonal = personal::orderBy('id','DESC')
        ->paginate(4);
        return view('infoPersonal.index', compact('infPersonal'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('infoPersonal.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($foto = personal::setCaratula($request->foto))
            $request->request->add(['foto' => $foto]);
        //validation
        $request->validate([
            'nombres' => 'required|max:25|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'num_externo' => 'integer',
            'curp' => 'required|min:18|max:18',
            'RFC' => 'required',
        ],
            [
                'nombres.required' => 'Nombres del alumno vacio :(',
                'nombres.max' => 'Nombres del alumno demaciado largo',
                'apellido_paterno.required' => 'Apellido paterno del alumno vacio :(',
                'apellido_paterno.max' => 'Apellido paterno excede número de caractares :(',
                'apellido_materno.required' => 'Apellido materno del alumno vacio :(',
                'apellido_materno.max' => 'Apellido materno excede número de caractares :(',
                'num_externo.integer' => 'solo es posible escribir numeros para el numero externo',
                'RFC.required' => 'Es necesario escribir el rfc',
                'curp.required' => 'Es necesario escribir curp',
            ]);

               
                $infPersonal = new personal();
                $infPersonal->nombres = strtoupper($request->input('nombres'));
                $infPersonal->apellido_paterno = strtoupper($request->input('apellido_paterno'));
                $infPersonal->apellido_materno = strtoupper($request->input('apellido_materno'));
                $infPersonal->num_externo = $request->input('num_externo');
                $infPersonal->RFC = strtoupper($request->input('RFC'));
                $infPersonal->curp = strtoupper($request->input('curp'));
                $infPersonal->correo_electronico = $request->input('correo_electronico');
                $infPersonal->foto = $request->input('foto');
                $infPersonal->save();
        
           
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
        $infPersonal = personal::select(
            'personals.id as id',
            'personals.nombres as persona_nombres',
            'personals.apellido_paterno as apellido_paterno',
            'personals.apellido_materno as apellido_materno',
            'personals.num_externo as num_externo',
            'personals.RFC as RFC',
            'personals.curp as curp',
            'personals.foto as foto',
            'personals.correo_electronico as correo_electronico',
            'historial_laborals.salario_diario_imss as salario_diario',
            'historial_laborals.descuento_infonavit as descuento_infonavit',
            'historial_laborals.fecha_de_baja as fecha_baja',
            'historial_laborals.sueldo_diario as sueldo_diario',
            'historial_laborals.estado as estado',
            'historial_laborals.zona as zona',
            'historial_laborals.fecha_ingreso_a_empresa as fecha_ingreso_a_empresa',
            'historial_laborals.num_seguro_social as num_seguro_social',
            'historial_laborals.fecha_alta_seguro_social',
            'prestamos.fonacot as fonacot',
            'prestamos.fonacot_importe_mensual as fonacot_importe_mensual',
            'prestamos.clave_interbancaria as clave_interbancaria',
            'catalogo_puestos.nombre as puesto',
            'catalogo_puestos.id as puesto_id',
            'proyectos.nombre as proyecto',
            'proyectos.id as proyecto_id',
            'catalogo_registro_patronals.id as rp_id',
            'catalogo_registro_patronals.nombre as rp_nombre',
            'instituciones_bancarias.nombre_de_institucion as sucursal_bancaria',
            'instituciones_bancarias.id as sucursal_bancaria_id',
            'statuses.status as status',
            'statuses.id as status_id',
            'control_vacaciones.dias_disfrutados as dias_disfrutados',
            'control_vacaciones.dias_por_disfrutar as dias_por_disfrutar',
            'control_vacaciones.fecha_inicial as fecha_inicial',
            'control_vacaciones.fecha_final as fecha_final',
            'documentos.identificacion_oficial as identificacion',


            )
            ->leftJoin('historial_laborals', 'personals.id', '=', 'historial_laborals.empleado_id')
            ->leftJoin('prestamos', 'personals.id', '=', 'prestamos.empleado_id')
            ->leftJoin('documentos', 'personals.id', '=', 'documentos.empleado_id')
            ->leftJoin('control_vacaciones', 'personals.id', '=', 'control_vacaciones.empleado_id')
            ->leftJoin('catalogo_puestos', 'historial_laborals.puesto_id', '=', 'catalogo_puestos.id')
            ->leftJoin('statuses', 'historial_laborals.status_id', '=', 'statuses.id')
            ->leftJoin('proyectos', 'historial_laborals.departamento_proyecto_id', '=', 'proyectos.id')
            ->leftJoin('catalogo_registro_patronals', 'historial_laborals.reg_patronal_perteneciente_id', '=', 'catalogo_registro_patronals.id')
            ->leftJoin('instituciones_bancarias', 'prestamos.sucursal_bancaria_id', '=', 'instituciones_bancarias.id')
            ->where('personals.id', $id)  
            ->first();
            $sucursal_bancaria = institucionesBancarias::all();
            $status = status::all();
        return view('infoPersonal.show', compact('infPersonal','sucursal_bancaria','status'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function documentoUp(Request $request)
    {

     $documento = documento::create([
        //Ojo aqui es en donde asignas la ruta del file a donde ira el documento en este caso es en la carpeta public/ pero puedes definir la carpeta que quieras
         'identificacion_oficial' => $request -> file('file') -> store('public/doc'),
         'empleado_id' => $request->input('empleado_id')
       ]);
          
          
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
        $personal = personal::find($id);
        $personal->update($request->all());

        $hist = historialLaboral::where('empleado_id', $id)->first();
        $hist->update($request->all());

        $hist = historialLaboral::where('empleado_id', $id)->first();
        $hist->status_id =$request->get('status_id');
        $hist->update();

        $prestamos = prestamos::where('empleado_id', $id)->first();
        $prestamos->update($request->all());

        $prestamoss = prestamos::where('empleado_id', $id)->first();
        $prestamoss->empleado_id = $request->get('empleado_id');
        $prestamoss->fonacot = $request->get('fonacot');
        $prestamoss->fonacot_importe_mensual = $request->get('fonacot_importe_mensual');
        $prestamoss->clave_interbancaria = $request->get('clave_interbancaria');
        $prestamoss->sucursal_bancaria_id = $request->get('sucursal_bancaria_id');
        $prestamoss->update();
        return redirect(route('personal.show', $id));

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
