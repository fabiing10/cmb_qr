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
</style>
@stop


@section('content')
<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/login">Inicio</a></li>
            <li class="active">Clientes</li>
          </ol>
          <h2 class="page-title">Clientes</h2>
        </div>
  </div>
  <div class="col-xlg-6 col-md-6">
      <div class="panel links-panel">
          <div class="panel-body">
            <div class="block-option none-mobile">
              <a href="clients/add/" class="btn btn-icon btn-primary btn-add-option wb-add-client" data-toggle="modal"></a>
              <span class="title-btn">Nuevo Cliente</span>
            </div>
            <div class="block-option">
              <a href="clients/add/" class="btn btn-dark-identipet none-desktop" style="margin-top:23px;">Nuevo Cliente</a>
              <a href="clients/report/" class="btn btn-dark-identipet" style="margin-top:23px;">Listado Cliente</a>
            </div>
          </div>
      </div>
  </div>
</div>

<div class="row" data-plugin="matchHeight" data-by-row="true">
  <div class="col-xlg-8 col-md-12">



  </div>

  <div class="col-xlg-12 col-md-12">
        <!-- tabla veterinarias -->
        <div class="panel">

                <div class="panel-body">
                  <table id="dataTableClients" class="table table-hover dataTable table-striped width-full">
                    <thead>
                      <tr>
                        <th>Identificacion</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Correo electronico</th>
                        <th>Fecha de registro</th>
                        <th>Detalles</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($clients as $client)
                      <tr>
                        <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$client->identification}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->lastName}}</td>
                        <td>
                          <?php
                          $phonesResult = json_decode($client->phones);
                          if($phonesResult == ""){
                            $phones = "Sin asignar";
                          }else{
                            $phones = $phonesResult->phone;
                          }
                          ?>
                          {{$phones}}
                        </td>
                        <td><a href="mailto:{{$client->email}}" target="_top">{{$client->email}}</a></td>
                        <td>{{$client->created_at}}</td>
                          <td width="100">
                            <a class="btn btn-dark-identipet" href="/administrator/clients/profile/{{Crypt::encrypt($client->id)}}" style=" line-height: 1em !important;">Detalles</a>
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

$('#dataTableClients').dataTable( {
    responsive: true,
    searching: true,
    lengthChange: false,
    destroy: true,
    paging: true,
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Buscar",
        lengthMenu: "_MENU_",
        paginate: {
            previous: '‹',
            next:     '›'
        }
    },
    lengthChange: true,
    lengthMenu: [ 10, 25, 50, 75, 100 ],
} );
</script>
@stop
