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
            <li class="active">Usuarios</li>
          </ol>
          <h2 class="page-title">Usuarios</h2>
        </div>
  </div>
  <div class="col-xlg-6 col-md-6">
    <div class="block-option none-mobile">
      <a href="users/add/" class="btn btn-icon btn-primary btn-add-option wb-add-client" data-toggle="modal"></a>
      <span class="title-btn">Nuevo Usuario</span>
    </div>
    <div class="block-option none-mobile">
      <a href="users/generateCodes/" class="btn btn-icon btn-primary btn-add-option wb-agregar-codigos" data-toggle="modal" style="background-color: #ffffff !important"></a>
      <span class="title-btn">Gnerar Codigos</span>
    </div>
    <!--<div class="block-option">
      <a href="users/reporte/excel" class="btn btn-dark-identipet" style="margin-top:23px;">Listado Usuarios</a>
    </div>-->
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
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo Electronico</th>
                        <th>Ciudad</th>
                        <th width="100">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($clients as $client)
                      <tr>
                        <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$client->name}}</td>
                        <td>{{$client->lastName}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->city}}</td>
                        <td width="100">
                          <a href="/control/users/delete" class="btn btn-icon btn-delete-admin wb-eliminar-codigo"></a>
                          <a href="/control/users/qr/{{Crypt::encrypt($client->id)}}" class="">
                            <i class="fa fa-qrcode" style="font-size:19px;color: #ff0066;position: relative;top: 4px;" aria-hidden="true"></i>
                          </a>
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
