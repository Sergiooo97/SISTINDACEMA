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
                        <form action="" method="GET" class="form-inline pull-right" role="search">
                          
                          <label for="nombres">Nombre:</label>
                          <input value="{{ request('nombres')}}" name="nombres" id="nombres" class="form-control"
                            onkeydown="document.ready = document.getElementById('grado').value = '0';document.ready = document.getElementById('grupo').value = '0';" />
          
                          <button type="submit" class="btn btn-info"><i  class="nc-icon nc-zoom-split"></i> Buscar</button>
                        </form>
                        <table id="example" class="table table-striped table-hover " style="width:100%">
                          <thead class=" text-info">
                           
                            <th>
                              No.Interno
                            </th>
                            <th>
                                No.Externo
                            </th>
                            <th>
                              Nombres
                            </th>
                            <th>
                              RFC
                            </th>
                            <th>
                              CURP
                            </th>
                            <th>
                                Correo electronico
                            </th>
                            <th>
                                foto
                            </th>
                          </thead>
                          <tbody>
                            
                            @foreach ($infPersonal as $info)
                            <tr url="">
                              <td>
                                {{ $info->id}}
                              </td>
                              <td>
                                {{ $info->num_externo}}
                              </td>
                              <td>
                                {{ $info->apellido_paterno}} {{ $info->apellido_materno}} {{ $info->nombres}}
                              </td>
                              <td>
                                {{ $info->RFC}}
                              </td>
                              <td>
                                {{ $info->curp}}                              
                             </td>
                              <td>
                                {{ $info->correo_electronico}}
                              </td>     
                              <td>
                                <a class="btn btn-info" href="{{route('personal.show', ['id' => $info->id])}}">Detalles</a>
                              </td>         
                            </tr> 
                            @endforeach
                            
                                  <input id="id_alumno[]" value="hola" name="id_alumno[]" class="form-control" hidden>
          
                          </tbody>
                        </table>
                        {{$infPersonal->links('vendor.pagination.bootstrap-4') }} 

                        <!-------------------------------------------termina tabla ---------------------------------->
                      </div>
                </div>
            </div>
            <a class="btn btn-info pull-right" href="{{ route('personal.create') }}">Registrar</a>

        </div>
    </div>
</div>
@endsection
