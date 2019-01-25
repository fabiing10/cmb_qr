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
            <li class="active">Veterinarias</li>
          </ol>
          <h2 class="page-title">Veterinarias</h2>
        </div>
  </div>
  <div class="col-xlg-6 col-md-6">
      <div class="panel links-panel">
          <div class="panel-body">
            <div class="block-option">
              <a href="veterinary/add/" class="btn btn-icon btn-primary btn-add-option wb-nueva-veterinaria" data-toggle="modal">

              </a>
              <span class="title-btn">Nueva Veterinaria</span>
            </div>
            <div class="block-option">
              <a href="veterinary/reporte/excel" class="btn btn-dark-identipet" style="margin-top:23px;">Listado Veterinarias</a>
            </div>
          </div>
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
                            <th>Veterinaria</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Telefono</th>
                            <th>Correo Electronico</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($veterinary as $data)
                          <tr>
                            <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$data->name}}</td>
                            <td>{{$data->address}}</td>
                            <td>{{$data->city}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->email}}</td>
                            <td width="100">
                              <div class="dropdown">
                                <button type="button" class="btn btn-dark-identipet dropdown-toggle" id="exampleColorDropdown6"
                                data-toggle="dropdown" aria-expanded="false">Opciones
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="exampleColorDropdown6"
                                role="menu">
                                  <li role="presentation">
                                    <li role="presentation"><a href="/control/veterinary/{{Crypt::encrypt($data->veterinaryId)}}" role="menuitem">Detalles</a></li>
                                    <li role="presentation"><a href="/control/veterinary/delete/{{Crypt::encrypt($data->veterinaryId)}}" role="menuitem">Eliminar</a></li>
                                  </li>
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
</div>
@stop



@section('plugins')
<script src="{{URL::asset('admin/global/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-fixedheader/dataTables.fixedHeader.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-bootstrap/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-tabletools/dataTables.tableTools.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asrange/jquery-asRange.min.js')}}"></script>
<script src=".{{URL::asset('admin/global/vendor/bootbox/bootbox.js')}}"></script>
@stop

@section('script')
<script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v2.js')}}"></script>

<script type="text/javascript">

  $('.next-btn').click(function(){
    console.log("Next")
    var option = $('#active_tab').val();
    if(option == "veterinary"){
        console.log(option)
        $(".panel-veterinary").fadeOut();
        $(".panel-option").fadeIn();
    }
  });

  $('.next-to-admin').click(function(){
    $('#active_tab').val("administrator");
        $(".panel-option").fadeOut();
        $(".panel-administrator").fadeIn();

  });

  $('.next-to-finish').click(function(){
    $('#form-veterinary').submit();

  });



  $('.close').click(function(){
    $('#active_tab').val("veterinary");
        $(".panel-option").fadeOut();
        $(".panel-administrator").fadeOut();
        $(".panel-veterinary").fadeIn();

  });





  function loadHeadquarters(HeadquarterId){
    alert(HeadquarterId)
  }
</script>

@stop
