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

        <form method="POST" id="form" action="{{ route('prestamos.store') }}">
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
                  <div class="form-group">
                    <h3>Historial laboral</h3>
                    <div class="container">
                                   
                      <div class="row">
                        <div class="col-sm-4">
                          <label for="exampleFormControlSelect1">EMPLEADO</label>
                          <input name="empleado"id="empleado" class="form-control" value="{{ $empleado->nombres}}" readonly>
                        </div>
                        <div class="col-sm-4">
                          <label for="exampleFormControlSelect1">NÚMERO DE EMPLEADO</label>
                          <input name="empleado_id"id="empleado_id" class="form-control" value="{{ $empleado->id}}" readonly>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">FONACOT</label>
                            <select name="fonacot" class="form-control" id="exampleFormControlSelect1">
                              <option value="Si">SI</option>
                              <option value="No">NO</option>
                              <option value="Aplica">Aplica</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm">
                          <label>FONACOT IMPORTE MENSUAL</label>
                          <input name="fonacot_importe_mensual"id="fonacot_importe_mensual" class="form-control" type="number" >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">  
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">SUCURSAL BANCARIA</label>
                            <select name="sucursal_bancaria_id" class="form-control" id="sucursal_bancaria_id">
                            
                        <option value="">Seleccione</option>
                        
                        @foreach ($sucursal_bancaria as $sucursal)
                        <option value="{{ $sucursal->id }}">{{ $sucursal->nombre_de_institucion }} {{ $sucursal->id }}</option>
                        @endforeach
                              
                            </select>
                          </div>
                        </div>
                        <div class="col-sm">
                          <label>CLABE INTERBANCARIA</label>
                          <input name="clave_interbancaria" id="sucursal_bancaria" type="number" class="form-control"  maxlength="5">                        </div>
                       
                      </div>
                    
                      </div>
                    </div>
                  
                        <button type="submit" class="btn btn-success" onclick="confirmAlert()" >Registrar</button>
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
