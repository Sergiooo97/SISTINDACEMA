@extends('layouts.app')
<style>
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

</style>
@section('content')
    <div class="container fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Vacaciones') }}</div>

                    <div class="card-body">
                        <div class="table-responsive ">
                            <!-------------------------------------------empieza tabla ---------------------------------->

                            <table id="example" class="table table-striped table-hover " style="width:100%">
                                <thead class=" text-info">

                                    <th>
                                        {{ __('NÚMERO DE EMPLEADO') }}
                                    </th>
                                    <th>
                                        {{ __('NOMBRES') }}
                                    </th>
                                   
                                    <th>
                                        {{ __('PERIODO PERTENECIENTE') }}
                                    </th>
                                    <th>
                                        {{ __('DIAS VACACIONES') }}
                                    </th>
                                    <th>
                                        {{ __('FECHA INICIAL') }}
                                    </th>
                                    <th>
                                        {{ __('FECHA FINAL') }}
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($vacaciones as $vacacion)
                                        <tr url="{{ route('vacaciones.create', ['id'=>$vacacion->empleado_id])}}">
                                            <td>
                                                {{ $vacacion->empleado_id }}
                                            </td>
                                            <td>
                                                {{ $vacacion->nombres }}
                                            </td>
                                        
                                            <td>
                                                {{ $vacacion->periodo_perteneciente }}
                                            </td>
                                            <td>
                                                {{ $vacacion->dias_vacaciones }}
                                            </td>
                                            <td>
                                                {{ $vacacion->fecha_inicial }}
                                            </td>
                                            <td>
                                                {{ $vacacion->fecha_final }}
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <input id="id_alumno[]" value="hola" name="id_alumno[]" class="form-control" hidden>
                                </tbody>
                            </table>

                            <!-------------------------------------------termina tabla ---------------------------------->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
