@extends('layouts.app')
<style>
.col-sm{
  padding-top: 1em !important;
}
.col-sm-6{
  padding-top: 1em !important;
}
.col-sm-4{
  padding-top: 1em !important;
}
input[type=”file”]#nuestroinput {
 width: 0.1px;
 height: 0.1px;
 opacity: 0;
 overflow: hidden;
 position: absolute;
 z-index: -1;
 }
 label[for=" nuestroinput"] {
 font-size: 14px;
 font-weight: 600;
 color: #fff;
 background-color: #106BA0;
 display: inline-block;
 transition: all .5s;
 cursor: pointer;
 padding: 15px 40px !important;
 text-transform: uppercase;
 width: fit-content;
 text-align: center;
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
  .custom-input-file {
  background-color: #941B80;
  color: #fff;
  cursor: pointer;
  font-size: 18px;
  font-weight: bold;
  margin: 0 auto 0;
  min-height: 15px;
  overflow: hidden;
  padding: 10px;
  position: relative;
  text-align: center;
  width: 400px;
}

.custom-input-file .input-file {
 border: 10000px solid transparent;
 cursor: pointer;
 font-size: 10000px;
 margin: 0;
 opacity: 0;
 outline: 0 none;
 padding: 0;
 position: absolute;
 right: -1000px;
 top: -1000px;
}
  </style>
@section('content')
<div class="container fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Información personal') }}</div>

                <div class="card-body">

       
                  <div class="form-group">
                    <h3>Historial laboral</h3>
                    <div class="container">
                     
                        <form method="POST" id="form" action="{{ route('historial-laboral.store') }}">
                          @csrf
                                  @if (count($errors)>0)
                                  <div id="ERROR_COPY" style="display: none;" class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <ul>
                                      <li>
                                        {{ $error }}
                                      </li>
                                    </ul>
                                    @endforeach
                                  </div>
                              @endif
                         
                                   
                      <div class="row">
                        <div class="col-sm-4">
                          <label for="exampleFormControlSelect1">EMPLEADO</label>
                          <input name="empleado"id="empleado" class="form-control" value="{{ $empleado->nombres}}" readonly >
                        </div>
                        <div class="col-sm-4">
                          <label for="exampleFormControlSelect1">NÚMERO DE EMPLEADO</label>
                          <input name="empleado_id"id="empleado_id" class="form-control" value="{{ $empleado->id}}" readonly>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">PUESTO</label>
                            <select name="puesto_id" class="form-control" id="exampleFormControlSelect1">
                              @if (request('puestos') == "")
                        <option value="">Seleccione</option>
                        @else
                        <option value="{{ $puestos->id }}">{{ $puestos->Nombre }}</option>
                        @endif
                        @foreach ($puestos as $puesto)
                        <option value="{{ $puesto->id }}">{{ $puesto->Nombre }}</option>
                        @endforeach
                              
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">REGISTRO PATRONAL PERTENECIENTE</label>
                            <select name="reg_patronal_perteneciente_id" class="form-control" id="exampleFormControlSelect1">
                              @if (request('puestos') == "")
                        <option value="">Seleccione</option>
                        @else
                        <option value="{{ $rp->id }}">{{ $rp->Nombre }}</option>
                        @endif
                        @foreach ($rps as $rp)
                        <option value="{{ $rp->id }}">{{ $rp->Nombre }}</option>
                        @endforeach
                            </select>
                          </div>
                          
                        </div>
                        <div class="col-sm-4">
                          <label>SALARIO DIARIO IMSS</label>
                          <input name="salario_diario_imss"id="salario_diario_imss" class="form-control" >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <label>DESCUENTO INFONAVIT</label>
                          <input name="descuento_infonavit" id="descuento_infonavit" type="number" class="form-control"  maxlength="5">                        </div>
                        <div class="col-sm">
                          <label>FECHA DE BAJA</label>
                          <input type="date" name="fecha_de_baja" id="fecha_de_baja" class="form-control" autocomplete="off" >
                        </div>
                        <div class="col-sm">
                          <label>SUELDO DIARIO</label>
                          <input name="sueldo_diario" id="sueldo_diario" class="form-control" autocomplete="off" 
                            required>
                        </div>
                        </div>
                        <div class="row">
                          <div class="col-sm">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">DEPARTAMENTO/ PROYECTO</label>
                              <select name="departamento_proyecto_id" class="form-control" id="exampleFormControlSelect1">
                                @if (request('proyectos') == "")
                                <option value="">Seleccione</option>
                                @else
                                <option value="{{ $proyectos->id }}">{{ $proyectos->nombre }}</option>
                                @endif
                                @foreach ($proyectos as $proyecto)
                                <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-sm">
                            <label>ESTADO</label>
                            <input name="estado" id="estado" class="form-control" autocomplete="off">
                          </div>
                          <div class="col-sm">
                            <label>ZONA</label>
                            <input name="zona" id="zona" class="form-control" autocomplete="off" 
                              required>
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <label>FECHA DE INGRESO EMPRESA</label>
                              <input name="fecha_ingreso_a_empresa" id="fecha_ingreso_a_empresa" type="date" class="form-control"  maxlength="5">                        </div>
                            <div class="col-sm">
                              <label>NUMERO DE SEGURIDAD SOCIAL</label>
                              <input name="num_seguro_social" id="num_seguro_social" class="form-control" autocomplete="off" >
                            </div>
                            <div class="col-sm">
                              <label>FECHA ALTA AL SEGURO SOCIAL</label>
                              <input type="date" name="fecha_alta_seguro_social" id="fecha_alta_seguro_social" class="form-control" autocomplete="off" 
                                required>
                            </div>
                            </div>
                     
                      </div>
                    </div>
                  
                        <button type="submit" class="btn btn-success pull-right" onclick="confirmAlert()" >Registrar</button>
                      </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')
<script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
         <script>
          var has_errors = {{$errors->count() > 0 ? 'true' : 'false'}};
        
          if( has_errors ){
            Swal.fire({
                title: '<strong>Oops.. :(</br> <p style="font-size: 20px;">Corregir los siguientes errores: </p>',
                type: 'errors',
                icon: 'error',
                html:jQuery("#ERROR_COPY").html(),
                showCloseButton: true,
        
              })
          }
        
        
        function confirmAlert() {
        event.preventDefault();
         let form = event.target;
                Swal.fire({
                      title: '¡Está seguro de realizar el registro?',
                      text: "Estás a tiempo de cancelar!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Si, registrar!'
                    }).then((result) => {
                      if (result.value) {
                        document.getElementById("form").submit();
                        if(form.submit()){
                          Swal.fire(
                          'Registro con éxito!',
                          'Ahora te mandaré a la lista :).',
                          'success'
                        )
                        }
        
                      }
                    })
           }
        </script>
@endsection
