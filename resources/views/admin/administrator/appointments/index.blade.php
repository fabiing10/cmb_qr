@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.administrator')
@stop

@section('style')
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asspinner/asSpinner.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/select2/select2.css')}}">
<style media="screen">
@media only screen and (max-width: 768px) {
  .none-mobile{
    display: none;
  }
  .btn{
    width: 49% !important;
    margin-top: 0px !important;
  }
  .btn-administrator{
    width: 100% !important;
  }
  header.panel-heading {
    height: 50px !important;
  }
}
@media (min-width: 768px){
  .none-desktop{
    display: none;
  }
}
@media (max-width: 480px) {
  a.btn-dark-identipet {
      width: 90% !important;
  }
}
</style>
@stop

@section('content')
<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/login">Inicio</a></li>
            <li class="active">Citas Medicas</li>
          </ol>
          <h2 class="page-title">Citas Medicas</h2>
        </div>
  </div>
  <div class="col-xlg-6 col-md-6">
      <div class="panel links-panel">
          <div class="panel-body">
            <div class="block-option none-mobile">
              <a href="appointments/pets" class="btn btn-icon btn-primary btn-add-option" style="background-color:transparent !important;">
                <i class="icon wb-calendar" aria-hidden="true" style="font-size:20px;"></i>
              </a>
              <span class="title-btn">Nueva Cita</span>
            </div>
            <div class="block-option none-desktop">
              <a href="appointments/pets" class="btn btn-dark-identipet none-desktop" style="margin-top:23px;">Nueva Cita</a>
            </div>
          </div>
      </div>
  </div>

</div>
@include('admin.administrator.pets.cancel')

<div class="row" data-plugin="matchHeight" data-by-row="true">

    <div class="col-xlg-12 col-md-12">
        <!-- tabla veterinarias -->
        <div class="panel">
                <header class="panel-heading">
                  <div class="panel-actions"></div>
                  <br>
                </header>
                <div class="panel-body">
                  <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                      <tr>
                  <th>Estado</th>
                  <th>Propietario</th>
                  <th>Mascota</th>
                  <th>Raza Mascota</th>
                  <th>Color Mascota</th>
                  <th>Tamaño</th>
                  <th>Medico</th>
                  <th>Fecha</th>
                  <th>Detalles</th>
                </tr>
              </thead>

              <tbody>
                @foreach($appointments as $appointment)
                <?php
                  $characteristics = json_decode($appointment->characteristics);
                  $properties = json_decode($appointment->properties);
                ?>
                <tr>
                  <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$appointment->status}}</td>
                  <td>{{$appointment->user}}</td>
                  <td>{{$appointment->namePet}}</td>
                  <td>
                    <?php
                    $raza = $characteristic->getRace($appointment->petId);
                    echo $raza;
                    ?>
                  </td>
                  <td>{{$characteristics->color}}</td>
                  <td>{{$characteristics->medida}}</td>
                  <td>{{$properties->veterinary}}</td>
                  <td>{{$appointment->dateAppointment}}</td>
                  <td>

                    <div class="dropdown">
                      <button type="button" class="btn btn-primary dropdown-toggle" id="listOptionCH" data-toggle="dropdown" aria-expanded="false">
                      <i class="icon wb-grid-9" aria-hidden="true"></i>
                      <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="listOptionCH" role="menu">
                        <li role="presentation">
                          <a href="appointments/details/{{Crypt::encrypt($appointment->idAppointment)}}" role="menuitem">Detalles</a>
                        </li>
                        <li role="presentation">
                          <a href="appointments/reschedule/{{Crypt::encrypt($appointment->idAppointment)}}" role="menuitem">Reprogramar</a>
                        </li>
                        @if ($appointment->status === 'Activa')
                        <li role="presentation">
                          <a data-target="#cancelAppoiment" data-toggle="modal" onclick="cancelAppoiment({{$appointment->idAppointment}})" role="menuitem">Cancelar</a>
                        </li>
                        @else
                        <li role="presentation">
                          <a href="appointments/reactive/{{Crypt::encrypt($appointment->idAppointment)}}" role="menuitem">Activar</a>
                        </li>
                        @endif
                      </ul>
                    </div>
                  </td>
                </tr>
                @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        <!-- fin tabla veterinarias -->
    </div>

    <div class="col-xlg-6 col-md-12" id="motivo" style="display:none">
        <!-- tabla veterinarias -->
        <div class="panel">
                <header class="panel-heading">
                  <div class="panel-actions"></div>
                  <br>
                </header>
                <div class="panel-body">
                  <div class="row">
                    <h3 style="text-align:center">Descripcion de la cita</h3>
                    <p id="razon">  </p>
                  </div>
                </div>
              </div>
        <!-- fin tabla veterinarias -->
    </div>
</div>
@stop




@section('plugins')
<script src="{{URL::asset('admin/global/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-fixedheader/dataTables.fixedHeader.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-bootstrap/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-tabletools/dataTables.tableTools.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asrange/jquery-asRange.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/bootbox/bootbox.js')}}"></script>

<script src="{{URL::asset('admin/global/vendor/select2/select2.full.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/switchery/switchery.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asspinner/jquery-asSpinner.min.js')}}"></script>


@stop

@section('script')
<script src="{{URL::asset('admin/global/js/components/select2.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/asspinner.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v2.js')}}"></script>
<script>




$(document).ready(function() {
  console.log("Load datepiocke");
  // Handler for .ready() called.
  $('.date').datepicker({ minDate: 0 });
});

function cancelAppoiment(Id) {
  $("#idAppointment").val(Id);
}
function myFunction(id) {
    document.getElementById("motivo").style.display = "initial";

    var value = id;

$.get( "appointments/"+value)
  .done(function( data ) {
document.getElementById("razon").innerHTML =
data.description;
  });
}



</script>


@stop
