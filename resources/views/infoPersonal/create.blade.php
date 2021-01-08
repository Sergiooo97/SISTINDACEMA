@extends('layouts.app')
<style>
.col-sm{
  padding-top: 1em !important;
}
.col-sm-6{
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

        <form method="POST" id="form" action="{{ route('personal.store') }}" enctype="multipart/form-data">
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
                    <h3>Información Personal</h3>
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-4">
                          <label>Nombres</label>
                          <input name="nombres"id="nombres" class="form-control" >
                        </div>
                        <div class="col-sm-4">
                          <label>Apellido paterno</label>
                          <input name="apellido_paterno"id="apellido_paterno" class="form-control" >
                        </div>
                        <div class="col-sm-4">
                          <label>Apellido materno</label>
                          <input name="apellido_materno"id="apellido_materno" class="form-control" >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <label>Número exterior</label>
                          <input name="num_externo" id="num_exterior" type="number" class="form-control"  maxlength="10">                        </div>
                        <div class="col-sm">
                          <label>RFC</label>
                          <input name="RFC" id="RFC" class="form-control" autocomplete="off" maxlength="13"  minlength="13">
                        </div>
                        <div class="col-sm">
                          <label>curp</label>
                          <input name="curp" id="curp_al" class="form-control" autocomplete="off" maxlength="18" minlength="18"
                            required>
                        </div>
                        </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <label>email</label>
                          <input name="correo_electronico" id="correo_tutor" type="email" class="form-control"  >
                        </div>
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <h3>Documentos</h3>
                      <div class="container">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group form-file-upload form-file-simple">
                              <input type="file" id="nuestroinput" name="foto">
                            </div>      
                          </div>
                           </div>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-success" >Registrar</button>
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
