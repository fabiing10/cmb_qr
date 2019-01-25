@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.admin')
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
            <li><a href="/control">Inicio</a></li>
            <li class="active">Codigos</li>
          </ol>
          <h2 class="page-title">Codigo QR</h2>
        </div>
  </div>
</div>

<br>
<div class="row" style="padding-top: 10px;">
    <div class="col-xlg-6 col-md-6">
        <!-- tabla veterinarias -->
        <center>
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(400)->generate($url)) !!} ">
        </center>
        <!-- fin tabla veterinarias -->
    </div>
    <div class="col-xlg-6 col-md-6">
        <!-- tabla veterinarias -->
          <h4>Nombres:</h4>
          {{$user->name}}
          <h4>Apellidos:</h4>
          {{$user->lastName}}
          <h4>Cedula:</h4>
          {{$user->identification}}
          <h4>URL:</h4>
          <a href="{{$url}}" target="_blank">Click Aquí</a>
          <br><br>
          <a class="btn btn-dark-identipet" download="{{$user->identification}}.png" href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(400)->generate($url)) !!}">
            Descargar
          </a>
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

<script type="text/javascript">

$(document).ready(function($) {




  // Handler for .ready() called.
  $('#selectVeterinary').on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
        $("#rowVeterinary").fadeIn();
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        $("#rowVeterinary").fadeOut();
    }
});


});
</script>
@stop
