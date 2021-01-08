@extends('layouts.app')
<style>
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #007B8D !important;
        border-color: #007B8D !important;
    }

    .page-link {
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007B8D !important;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff !important;
        background-color: #007B8D;
        border-color: #007B8D;
    }

    .curso-asignar a {
        font-size: 30px;
        color: #ffffff;
    }

    tr:hover td {
        background: rgba(199, 212, 221, 0.6) !important;
        cursor: pointer !important;
    }

    .tbl {
        overflow: hidden;
    }

    .table-responsive:hover {
        overflow: scroll !important;
    }

</style>
@section('content')
    <div class="container fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Historial laboral') }}
                    <h4>Seleccionar empleado para registrar nueva Información</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive ">
                            <!-------------------------------------------empieza tabla ---------------------------------->
                            <form action="" method="GET" class="form-inline pull-right" role="search">

                                <label for="nombres">Nombre:</label>
                                <input value="{{ request('nombres') }}" name="nombres" id="nombres" class="form-control"
                                    onkeydown="document.ready = document.getElementById('grado').value = '0';document.ready = document.getElementById('grupo').value = '0';" />

                                <button type="submit" class="btn btn-info"><i class="nc-icon nc-zoom-split"></i>
                                    Buscar</button>
                            </form>
                            <table id="example" class="table table-striped table-hover " style="width:100%">
                                <thead class=" text-info">

                                    <th>
                                        NO.EMPLEADO
                                    </th>
                                    <th>
                                        NOMBRE
                                    </th>
                                    <th>
                                        PUESTO
                                    </th>
                                    <th>
                                        REGISTRO PATRONAL PERTENECIENTE
                                    </th>
                                  
                                    <th>
                                        SUELDO DIARIO
                                    </th>
                                    <th>
                                        DEPARTAMENTO/ PROYECTO
                                    </th>

                                    <th>
                                        FECHA DE INGRESO EMPRESA
                                    </th>
                                    <th>
                                      
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach ($historialLaboral as $hist)
                                        <tr url="{{ route('historial-laboral.create', ['id' => $hist->empleado_id]) }}">
                                            <td>
                                                {{ $hist->empleado_id }}
                                            </td>
                                            <td>
                                                {{ $hist->nombre_persona }}
                                            </td>
                                            <td>
                                                {{ $hist->puesto }}
                                            </td>
                                            <td>
                                                {{ $hist->rp }}
                                            </td>
                                            
                                           
                                            <td>
                                                {{ $hist->sueldo_diario }}
                                            </td>
                                            <td>
                                                {{ $hist->proyecto }}
                                            </td>
                                            <td>
                                                {{ $hist->ingreso_a_empresa }}
                                            </td>
                                            <td>
                                              <a href="#" class="btn btn-info">Mas info</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <input id="id_alumno[]" value="hola" name="id_alumno[]" class="form-control" hidden>

                                </tbody>
                            </table>
                            {{ $historialLaboral->links('vendor.pagination.bootstrap-4') }}

                            <!-------------------------------------------termina tabla ---------------------------------->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <input id="id_alumno[]" value="hola" name="id_alumno[]" class="form-control" hidden>

    </tbody>
    </table>
    {{ $historialLaboral->links('vendor.pagination.bootstrap-4') }}

    <!-------------------------------------------termina tabla ---------------------------------->
    </div>
    </div>
    </div>
  
    </div>
    </div>
    </div>
@endsection
