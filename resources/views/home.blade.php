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

</style>
@section('content')
<div class="container fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="table-responsive ">
                        <!-------------------------------------------empieza tabla ---------------------------------->
                        <form action="" method="GET" class="form-inline pull-right" role="search">
                          
                          <label for="nombres">Nombre:</label>
                          <input value="{{ request('nombres')}}" name="nombres" id="nombres" class="form-control"
                            onkeydown="document.ready = document.getElementById('grado').value = '0';document.ready = document.getElementById('grupo').value = '0';" />
          
                          <button type="submit" class="btn btn-info"><i  class="nc-icon nc-zoom-split"></i> Buscar</button>
                        </form>
                        <table id="example" class="table table-striped table-hover " style="width:100%">
                          <thead class=" text-info">
                           
                            <th>
                              Num.interno
                            </th>
                            <th>
                              Nombres
                            </th>
                            <th>
                              RFC
                            </th>
                            <th>
                              Puesto
                            </th>
                            <th>
                              Fecha de ingreso
                            </th>
                            <th>
                               Registro patronal
                            </th>
                            <th>
                                Sucursal bancaria
                            </th>
                            <th>
                              Status
                          </th>
                          </thead>
                          <tbody>
                            
                            @foreach ($infPersonal as $inf)
                            @if ($inf->status_id == 2)
                            <tr style="background: rgb(211, 211, 211); text-decoration: line-through;" url="{{ route('personal.show', ['id' => $inf->id]) }}">
                            @else
                            <tr url="{{ route('personal.show', ['id' => $inf->id]) }}">

                            @endif
                              <td>
                                {{$inf->id}}
                              </td>
                              <td>
                                {{$inf->nombres}}
                              </td>
                              <td>
                                {{$inf->RFC}}
                              </td>
                              <td>
                                {{$inf->puesto}}
                              </td>
                              <td>
                                {{$inf->fecha_ingreso_a_empresa}}                             
                             </td>
                              <td>
                                {{$inf->rp}}   
                              </td>
                              <td>
                                {{$inf->sucursal_bancaria}}   
                              </td>
                              
                             
                              @if ($inf->status_id == 1)
                              <td style="text-decoration: none;">
                                ACTIVO  
                              </td>
                              @endif
                              @if ($inf->status_id == 2)
                              <td style="text-decoration: none !important;">
                                IINACTIVO
                              </td>
                              @endif
                              @if ($inf->status_id == null) 
                              <td style="text-decoration: none !important;">
                                PENDIENTE...
                              </td>
                              @endif


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
