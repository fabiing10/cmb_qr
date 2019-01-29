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
            <li><a href="/login">Inicio</a></li>
            <li class="active">Reporte</li>
          </ol>
          <h2 class="page-title">Reporte</h2>
        </div>
  </div>
  <div class="col-xlg-6 col-md-6">
    <div class="block-option none-mobile">
      <a href="users/generateReport/" class="btn btn-icon btn-primary btn-add-option wb-agregar-codigos" data-toggle="modal" style="background-color: #ffffff !important"></a>
      <span class="title-btn">Descargar Reporte</span>
    </div>
  </div>
</div>

<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-4 col-md-4">
        <div class="page-header" style="padding:5px 10px;">
          <p class="data-report">Ingresado: {{$reportInsideCount}}</p></br>
          <p class="data-report">Salido: {{$reportOutsideCount}}</p>
        </div>
  </div>
  <div class="col-xlg-4 col-md-4">
        <div class="page-header" style="padding:5px 10px;">
          <p class="data-report">Sin Ingresar: {{$userWithoutOutside}}</p></br>
          <p class="data-report">Desayuno: {{$reportBreakfastCount}}</p>
        </div>
  </div>
  <div class="col-xlg-4 col-md-4">
        <div class="page-header" style="padding:5px 10px;">
          <p class="data-report">Almuerzo: {{$reportLunchCount}}</p></br>
          <p class="data-report">Cena: {{$reportDinnerCount}}</p>
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
                        <th>Nombre</th>
                        <th>Cedula</th>
                        <th>Ingresado</th>
                        <th>Salido</th>
                        <th>Desayuno</th>
                        <th>Almuerzo</th>
                        <th>Cena</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $u)
                      <?php
                        $inside = $event->foundInside($u->id, $param);
                        $outside = $event->foundOutside($u->id, $param);
                        $breakfast = $event->foundBreakfast($u->id, $param);
                        $lunch = $event->foundLunch($u->id, $param);
                        $dinner = $event->foundDinner($u->id, $param);
                      ?>
                      <tr>
                        <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$u->name}} {{$u->lastName}}</td>
                        <td>{{$u->identification}}</td>
                        <td>{{$inside}}</td>
                        <td>{{$outside}}</td>
                        <td>{{$breakfast}}</td>
                        <td>{{$lunch}}</td>
                        <td>{{$dinner}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
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

function setUser(userId){
  document.getElementById("userId").value = userId;
}


function deleteUser(userId){
  document.getElementById("userDelete").value = userId;
}
</script>
@stop
