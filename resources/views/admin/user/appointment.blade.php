@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.user')
@stop

@section('style')
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asspinner/asSpinner.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/select2/select2.css')}}">
@stop

@section('content')
<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/user">Inicio</a></li>
            <li class="active">Citas Medicas</li>
          </ol>
          <h2 class="page-title">Citas Medicas</h2>
        </div>
  </div>


</div>


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
                  <th>Id Propietario</th>
                  <th>Mascota</th>
                  <th>Fecha</th>
                  <th>Detalles</th>
                  <th>Cancelar</th>
                </tr>
              </thead>

              <tbody>
                @foreach($appointments as $appointment)
                <tr>
                  <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$appointment->status}}</td>
                  <td>{{$appointment->user}}</td>
                  <td>{{$appointment->id}}</td>
                  <td>{{$appointment->namePet}}</td>
                  <td>{{$appointment->dateAppointment}}</td>
                  <td>
                    <button onclick="getappointment({{$appointment->idAppointment}})" class="btn btn-icon btn-danger btn-outline"  data-target="#userModal" data-toggle="modal" type="button" >
                      <i class="site-menu-icon icon wb-envelope-open" aria-hidden="true"></i>Detalles
                    </button>
                  </td>

                    @if ($appointment->status === 'Activa')
                    <td>
                    <button data-target="#cancelAppoiment" data-toggle="modal" onclick="cancelAppoiment({{$appointment->idAppointment}})" class="btn btn-icon btn-danger btn-outline" type="button" >
                      <i class="site-menu-icon icon wb-trash" aria-hidden="true"></i>Cancelar
                    </button>
                    </td>
                    @else
                    <td>
                    <button onclick="window.location.href='#'" class="btn btn-icon btn-danger btn-outline" type="button" style="opacity: 0.4;" >
                      <i class="site-menu-icon icon wb-trash" aria-hidden="true"></i>Cancelar
                    </button>
                    </td>
                    @endif

                </tr>
                @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        <!-- fin tabla veterinarias -->
    </div>
    @include('admin.user.cancel')
    <div class="modal fade" id="userModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"  role="dialog" tabindex="-1">
        <div class="modal-dialog" style="background:white;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <span class="input-group-addon" style="background-color: white; border: white;">
                <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Detalles Cita Medica</h4>
                <br>
            </span>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-lg-6 form-group" style="text-align:center;">
                  <label >Descripcion:</label><br>
                  <label style="font-weight: bolder;" id="razon"></label>
                </center>
              </div>
              <div class="col-lg-6 form-group" style="text-align:center;">
                  <label >Fecha:</label><br>
                  <label style="font-weight: bolder;" id="date"></label>
                </center>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-6 form-group" style="text-align:center;">
                  <label >Costo:</label><br>
                  <label style="font-weight: bolder;" id="cost"></label>
                </center>
              </div>
              <div class="col-lg-6 form-group" style="text-align:center;">
                  <label >Veterinario:</label><br>
                  <label style="font-weight: bolder;" id="veterinary"></label>
                </center>
              </div>
          </div>
        </div>
        </div>
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

function cancelAppoiment(Id) {
  $("#idAppointment").val(Id);
}

function getappointment(Id){
  $.get( "appointments/"+Id).done(function(data) {
      //document.getElementById("razon").innerHTML =data.description;
      //reference = $.parseJSON(data.description);
      //Set Reference
      $("#razon").html(data.description);
      properties = $.parseJSON(data.properties);
      $("#cost").html(properties.cost);
      $("#veterinary").html(properties.veterinary);
      $("#date").html(data.dateTime);

  });
}
/*    var value = id;

$.get( "appointments/"+value)
  .done(function( data ) {
document.getElementById("razon").innerHTML = data.description;
/*
var property = JSON.parse(data.properties);
document.getElementById("description").innerHTML = property.cost; 
  });
};
*/
</script>


@stop
