@extends('layouts.app')
@section('content')
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">Actualizar datos</h4>
                            <p class="card-category">Puede modificar datos</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('personal.update', $infPersonal->id) }}">
                                @csrf @method('PATCH')
                                <label style="font-weight: bold;">DATOS PERSONALES</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nombres</label>
                                            <input name="nombres" type="text" class="form-control"
                                                value="{{ $infPersonal->persona_nombres }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Apellido Paterno</label>
                                            <input name="apellido_paterno" type="text" class="form-control"
                                                value="{{ $infPersonal->apellido_paterno }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Apellido Materno</label>
                                            <input name="apellido_materno" type="text" class="form-control"
                                                value="{{ $infPersonal->apellido_materno }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Número Externo</label>
                                            <input name="num_externo" type="text" class="form-control"
                                                value="{{ $infPersonal->num_externo }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">RFC</label>
                                            <input name="RFC" type="text" class="form-control"
                                                value="{{ $infPersonal->RFC }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">CURP</label>
                                            <input name="curp" type="text" class="form-control"
                                                value="{{ $infPersonal->curp }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Correo Electrónico</label>
                                            <input type="email" class="form-control"
                                                value="{{ $infPersonal->correo_electronico }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <label style="font-weight: bold;">HISTORIAL LABORAL</label>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Num. Empleado</label>

                                            <input name="empleado_id" type="text" class="form-control"
                                                value="{{ $infPersonal->id }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Puesto</label>
                                            @if ($infPersonal->puesto == null)
                                                <a
                                                    href="{{ route('historial-laboral.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <input type="text" class="form-control" value="{{ $infPersonal->puesto }}">
                                                <input name="puesto_id" type="text" class="form-control"
                                                    value="{{ $infPersonal->puesto_id }}" hidden>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Departamento/Proyecto</label>
                                            @if ($infPersonal->proyecto_id == null)
                                                <a
                                                    href="{{ route('historial-laboral.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <input name="proyecto" type="text" class="form-control"
                                                    value="{{ $infPersonal->proyecto }}">
                                                <input name="departamento_proyecto_id" type="text" class="form-control"
                                                    value="{{ $infPersonal->proyecto_id }}" hidden>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Registro patrolal</label>
                                            @if ($infPersonal->rp_id == null)
                                                <a
                                                    href="{{ route('historial-laboral.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <input name="rp_nombre" type="text" class="form-control"
                                                    value="{{ $infPersonal->rp_nombre }}">
                                                <input name="reg_patronal_perteneciente_id" type="text" class="form-control"
                                                    value="{{ $infPersonal->rp_id }}" hidden>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Salario Diario Imss</label>
                                            @if ($infPersonal->salario_diario == null)
                                                <a
                                                    href="{{ route('historial-laboral.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <input name="salario_diario_imss" type="number" class="form-control"
                                                    value="{{ $infPersonal->salario_diario }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Descuento Infonavit</label>
                                            @if ($infPersonal->descuento_infonavit == null)
                                                <a
                                                    href="{{ route('historial-laboral.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <input name="descuento_infonavit" type="number" class="form-control"
                                                    value="{{ $infPersonal->descuento_infonavit }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Estado</label>
                                            @if ($infPersonal->estado == null)
                                                <a
                                                    href="{{ route('historial-laboral.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <input name="estado" type="text" class="form-control"
                                                    value="{{ $infPersonal->estado }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Zona</label>
                                            @if ($infPersonal->zona == null)
                                                <a
                                                    href="{{ route('historial-laboral.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <input name="zona" type="text" class="form-control"
                                                    value="{{ $infPersonal->zona }}">
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Fecha de ingreso a la empresa</label>
                                            @if ($infPersonal->fecha_ingreso_a_empresa == null)
                                                <a
                                                    href="{{ route('historial-laboral.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <input name="fecha_ingreso_a_empresa" type="date" class="form-control"
                                                    value="{{ $infPersonal->fecha_ingreso_a_empresa }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Fecha de alta de seguro social</label>
                                            @if ($infPersonal->fecha_alta_seguro_social == null)
                                                <a
                                                    href="{{ route('historial-laboral.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <input name="fecha_alta_seguro_social" type="date" class="form-control"
                                                    value="{{ $infPersonal->fecha_alta_seguro_social }}">
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Número segurp social</label>
                                            @if ($infPersonal->num_seguro_social == null)
                                                <a
                                                    href="{{ route('historial-laboral.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <input name="num_seguro_social" type="number" class="form-control"
                                                    value="{{ $infPersonal->num_seguro_social }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <label style="font-weight: bold;">DATOS DE PRESTAMOS</label>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div style="padding: 5px; margin:0;" class="form-group">
                                            <label class="bmd-label-floating">Fonacot</label>
                                            @if ($infPersonal->fonacot == null)
                                                <a
                                                    href="{{ route('prestamos.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <select style="padding: 5px;" name="fonacot" class="form-control"
                                                    id="fonacot">
                                                    <option value="{{ $infPersonal->fonacot }}">{{ $infPersonal->fonacot }}
                                                    </option>
                                                    <option value="Si">SI</option>
                                                    <option value="No">NO</option>
                                                    <option value="Aplica">Aplica</option>
                                                </select>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sucursal bancaria</label>
                                            @if ($infPersonal->sucursal_bancaria == null)
                                                <a
                                                    href="{{ route('prestamos.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <select name="sucursal_bancaria_id" class="form-control"
                                                    id="sucursal_bancaria_id">
                                                    <option value="{{ $infPersonal->sucursal_bancaria_id }}">
                                                        {{ $infPersonal->sucursal_bancaria }}</option>
                                                    @foreach ($sucursal_bancaria as $sucursal)
                                                        <option value="{{ $sucursal->id }}">
                                                            {{ $sucursal->nombre_de_institucion }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Fonacot importe mensual</label>
                                            @if ($infPersonal->fonacot_importe_mensual == null)
                                                <a
                                                    href="{{ route('prestamos.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <input name="fonacot_importe_mensual" type="number" class="form-control"
                                                    value="{{ $infPersonal->fonacot_importe_mensual }}">
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Clave interbancaria</label>
                                            @if ($infPersonal->clave_interbancaria == null)
                                                <a
                                                    href="{{ route('prestamos.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                            @else
                                                <input name="clave_interbancaria" type="number" class="form-control"
                                                    value="{{ $infPersonal->clave_interbancaria }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">STATUS:</label>
                                        <select style="padding: 5px;" name="status_id" class="form-control" id="status_id">
                                            <option value="{{ $infPersonal->status_id }}">{{ $infPersonal->status }}
                                            </option>
                                            @foreach ($status as $sta)
                                                <option value="{{ $sta->id }}">{{ $sta->status }} {{ $sta->id }}</option>
                                            @endforeach

                                        </select>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info pull-right">Actualizar datos</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="javascript:;">
                                <img class="img"
                                    src="{{ \Illuminate\Support\Facades\Storage::url("imagenes/foto/$infPersonal->foto") }}" />
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-gray">{{ $infPersonal->puesto }}</h6>
                            <h4 class="card-title">{{ $infPersonal->persona_nombres }}</h4>
                            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#documento_identificacion">
 Subir documentos
</button>
                            <a href="{{ Storage::url($infPersonal->identificacion) }}" class="btn btn-warning btn-round">{{ __('Documento de identificacion') }}</a>
                            <!-- Modal -->
                            <div class="modal fade" id="{{__('documento_identificacion')}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Subir </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                          <form method="POST" action="{{  route('personal.docUp')  }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                              <label for="documento">Subir archivo de identificación</label>
                                              <input name="empleado_id" value="{{ $infPersonal->id }}" >
                                              <input name="file" id="file" class="" type="file" >
                                            </div>
                                            <button type="submit" class="btn btn-success">Subir</button>
                                          </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Modal-->
                            
                            <hr>
                            <p>{{ __('VACACIONES') }}</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>{{ __('Dias disfrutados') }}</p>
                                    @if ($infPersonal->dias_disfrutados == null)
                                        <a href="{{ route('vacaciones.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                    @else
                                        <p style="font-weight:bold;" class="text-info">{{ $infPersonal->dias_disfrutados }}
                                        </p>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <p>Dias por disfrutar</p>
                                    @if ($infPersonal->dias_por_disfrutar == null)
                                        <a href="{{ route('vacaciones.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                    @else
                                        <p style="font-weight:bold;" class="text-info">
                                            {{ $infPersonal->dias_por_disfrutar }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>Fecha de inicio</p>
                                    @if ($infPersonal->fecha_inicial == null)
                                        <a href="{{ route('vacaciones.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                    @else
                                        <p style="font-weight:bold;" class="text-info">{{ $infPersonal->fecha_inicial }}</p>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <p>Fecha final</p>
                                    @if ($infPersonal->fecha_final == null)
                                        <a href="{{ route('vacaciones.create', ['id' => $infPersonal->id]) }}">registrar</a>
                                    @else
                                        <p style="font-weight:bold;" class="text-info">{{ $infPersonal->fecha_final }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="float-left">
                <ul>
                    <li>
                        <a href="https://www.creative-tim.com">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="https://creative-tim.com/presentation">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="https://www.creative-tim.com/license">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())

                </script>, made with <i class="material-icons">favorite</i> by
                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
            </div>
        </div>
    </footer>
    </div>
    </div>
    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Filters</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger active-color">
                        <div class="badge-colors ml-auto mr-auto">
                            <span class="badge filter badge-purple" data-color="purple"></span>
                            <span class="badge filter badge-azure" data-color="azure"></span>
                            <span class="badge filter badge-green" data-color="green"></span>
                            <span class="badge filter badge-warning" data-color="orange"></span>
                            <span class="badge filter badge-danger" data-color="danger"></span>
                            <span class="badge filter badge-rose active" data-color="rose"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="header-title">Images</li>
                <li class="active">
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../assets/img/sidebar-1.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../assets/img/sidebar-2.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../assets/img/sidebar-3.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../assets/img/sidebar-4.jpg" alt="">
                    </a>
                </li>
                <li class="button-container">
                    <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank"
                        class="btn btn-primary btn-block">Free Download</a>
                </li>
                <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
                <li class="button-container">
                    <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html"
                        target="_blank" class="btn btn-default btn-block">
                        View Documentation
                    </a>
                </li>
                <li class="button-container github-star">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>
                <li class="button-container text-center">
                    <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot;
                        45</button>
                    <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot;
                        50</button>
                    <br>
                    <br>
                </li>
            </ul>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="../assets/js/plugins/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="../assets/js/plugins/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="../assets/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="../assets/js/plugins/fullcalendar.min.js"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="../assets/js/plugins/arrive.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="../assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }

                }

                $('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $(
                            '.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' +
                                new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $(
                            '.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                            'img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' +
                                new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr(
                            'src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                            'img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' +
                            new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });

    </script>
@endsection
