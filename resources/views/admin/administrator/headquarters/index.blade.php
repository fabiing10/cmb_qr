@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.administrator')
@stop


@section('style')
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
@media (max-width: 480px){
  .panel-actions {
      width: 100%;
      right: 0px !important;
  }
}


</style>
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asspinner/asSpinner.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/select2/select2.css')}}">
@stop

@section('content')
<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/login">Inicio</a></li>
            <li class="active">Sedes</li>
          </ol>
          <h2 class="page-title">Sedes</h2>
        </div>
  </div>
</div>
<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">
                  <div class="nav-tabs-horizontal">
                          <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                            <li class="active" role="presentation">
                              <a data-toggle="tab" href="#codes" aria-controls="exampleTabsLineOne" role="tab" id="btnSedes">Sedes</a></li>
                            <li role="presentation">
                              <a data-toggle="tab" href="#codes-a" aria-controls="exampleTabsLineTwo" role="tab" id="btnAdministradores">Administradores</a></li>
                          </ul>
                          <div class="tab-content padding-top-20">
                            <div class="tab-pane active" id="codes" role="tabpanel">
                              <div class="panel">
                                      <header class="panel-heading" style="height:75px">
                                        <div class="panel-actions">
                                              <div class="panel links-panel">
                                                  <div class="panel-body">
                                                    <div class="block-option none-mobile">
                                                      <a href="headquarters/add" class="btn btn-icon btn-primary btn-add-option wb-add-sedes">
                                                      </a>
                                                      <span class="title-btn">Agregar Sede</span>
                                                    </div>
                                                    <div class="block-option">
                                                      <a href="headquarters/add" class="btn btn-dark-identipet none-desktop" style="margin-top:23px;">Agregar Sede</a>
                                                      <a href="headquarters/report/excel" class="btn btn-dark-identipet" style="margin-top:23px;">Listado Cliente</a>
                                                    </div>
                                                  </div>
                                              </div>
                                        </div>
                                        <br>
                                      </header>
                                      <div class="panel-body">
                                        <table class="table table-hover dataTable table-striped width-full" id="dataTableSedes">
                                          <thead>
                                            <tr>
                                              <th>Tipo</th>
                                              <th>Ciudad</th>
                                              <th>Sede</th>
                                              <th>Direccion</th>
                                              <th>Telefono</th>
                                              <th>Administrador</th>
                                              <th>Opciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach($headquarters as $headquarter)
                                              <tr>
                                                  @if($headquarter->principal == TRUE)
                                                    <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>Principal</td>
                                                  @else
                                                    <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>Sede</td>
                                                  @endif
                                                  <td>{{$headquarter->city}}</td>
                                                  <td>{{$headquarter->nameHeadquarter}}</td>
                                                  <td>{{$headquarter->address}}</td>
                                                  <td>{{$headquarter->phone}}</td>
                                                  <td>{{$headquarter->name_admin}}</td>
                                                  <td>
                                                    <div class="dropdown">
                                                    <button type="button" class="btn btn-dark-identipet dropdown-toggle" id="exampleColorDropdown6" data-toggle="dropdown" aria-expanded="false">Opciones
                                                      <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="exampleColorDropdown6" role="menu">
                                                        <li role="presentation">
                                                        <li role="presentation"><a href="headquarters/edit/{{Crypt::encrypt($headquarter->id)}}" role="menuitem">Editar</a></li>
                                                        <li role="presentation"><a href="headquarters/delete/{{Crypt::encrypt($headquarter->id)}}" role="menuitem">Eliminar</a></li>
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
                            </div>
                            <div class="tab-pane" id="codes-a" role="tabpanel">
                              <div class="panel">
                                      <header class="panel-heading" style="height:75px">
                                        <div class="panel-actions">
                                              <div class="panel links-panel">
                                                  <div class="panel-body">
                                                    <div class="block-option none-mobile">
                                                      <a href="headquarters/add/administrator" class="btn btn-icon btn-primary btn-add-option wb-add-client" >
                                                      </a>
                                                      <span class="title-btn">Agregar Administrador</span>
                                                    </div>
                                                    <div class="block-option">
                                                      <a href="headquarters/add/administrator" class="btn btn-dark-identipet btn-administrator none-desktop" style="margin-top:23px;">Agregar Administrador</a>
                                                    </div>
                                                  </div>
                                              </div>
                                        </div>
                                        <br>
                                      </header>
                                      <div class="panel-body">
                                        <table id="dataTableAdmin" class="table table-hover dataTable table-striped width-full">
                                          <thead>
                                            <tr>
                                              <th>Nombres</th>
                                              <th>Apellidos</th>
                                              <th>Ciudad</th>
                                              <th>sede</th>
                                              <th>Correo Electronico</th>
                                              <th>Opciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach($administrators as $admin)
                                            <tr>
                                                <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$admin->name}}</td>
                                                <td>{{$admin->lastName}} </td>
                                                <td>{{$admin->headquarterCity}}</td>
                                                <td>
                                                  @if($admin->nameHeadquarter == "")
                                                      {{$admin->nameVeterinary}}
                                                  @else
                                                      {{$admin->nameHeadquarter}}
                                                  @endif
                                                </td>
                                                <td>{{$admin->email}}</td>
                                                <td><div class="dropdown">
                                                  <button type="button" class="btn btn-dark-identipet dropdown-toggle" id="exampleColorDropdown6" data-toggle="dropdown" aria-expanded="false">Opciones
                                                    <span class="caret"></span>
                                                  </button>
                                                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="exampleColorDropdown6" role="menu">
                                                      <li role="presentation">
                                                      <li role="presentation"><a href="headquarters/edit/administrator/{{Crypt::encrypt($admin->id)}}" role="menuitem">Editar</a></li>
                                                      <?php
                                                        $u = Auth::user();
                                                        if($admin->id != $u->id){
                                                      ?>
                                                      <li role="presentation"><a href="headquarters/delete/administrator/{{Crypt::encrypt($admin->id)}}" role="menuitem">Eliminar</a></li>
                                                      </li>
                                                      <?php } ?>
                                                  </ul>
                                                </div>
                                              </td>
                                            </tr>
                                            @endforeach

                                          </tbody>
                                        </table>
                                      </div>
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


$('#dataTableSedes').dataTable({
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
});

$('#dataTableAdmin').dataTable({
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
    lengthMenu:[ 10, 25, 50, 75, 100 ],
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    $($.fn.dataTable.tables(true)).DataTable()
    .columns.adjust()
    .responsive.recalc();
  });
});
</script>


@stop
