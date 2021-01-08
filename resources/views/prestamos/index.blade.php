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
                <div class="card-header">{{ __('Información personal') }}</div>

                <div class="card-body">
                    <div class="table-responsive ">
                        <!-------------------------------------------empieza tabla ---------------------------------->
                        
                        <table id="example" class="table table-striped table-hover " style="width:100%">
                          <thead class=" text-info">
                           
                            <th>
                              NO.EMPLEADO
                            </th>
                            <th>
                              NOMBRES
                            </th>
                            <th>
                              FONACOT
                            </th>
                            <th>
                              FONACOT IMPORTE MENSUAL
                            </th>
                            <th>
                              SUCURSAL BANCARIA
                            </th>
                            <th>
                              CLABE INTERBANCARIA
                            </th>
                            <th>
                              CONTROL DE VACACIONES                            
                            </th>
                          </thead>
                          <tbody>
                            
                            @foreach ($prestamos as $prestamo)
                            <tr url="{{ route('prestamos.create', ['id' => $prestamo->empleado_id]) }}">
                              <td>
                                {{ $prestamo->empleado_id}}
                              </td>
                              <td>
                                {{ $prestamo->nombres}}
                              </td>
                              <td>
                                {{ $prestamo->fonacot}}
                              </td>
                              <td>
                                {{ $prestamo->fonacot_importe_mensual}}
                              </td>
                              <td>
                                {{ $prestamo->sucursal_bancaria}}                              
                             </td>
                             <td>
                              {{ $prestamo->clave_interbancaria}}                              
                           </td>
                           <td>
                           <a class="btn btn-info" href="{{ route('vacaciones.create') }}">Vacaciones</a>                              
                         </td> 
                            </tr> 
                            @endforeach
                                  <input id="id_alumno[]" value="hola" name="id_alumno[]" class="form-control" hidden>
                          </tbody>
                        </table>
                        {{$prestamos->links('vendor.pagination.bootstrap-4') }} 

                        <!-------------------------------------------termina tabla ---------------------------------->
                      </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
