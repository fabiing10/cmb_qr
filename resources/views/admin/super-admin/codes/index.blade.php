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
          <h2 class="page-title">Codigos</h2>
        </div>
  </div>
  <div class="col-xlg-6 col-md-6">
      <div class="panel links-panel">
          <div class="panel-body">
            <div class="block-option">
              <a href="codes/generate" style="background-color:white !important;" class="btn btn-icon btn-primary btn-add-option wb-agregar-codigos"></a>
              <span class="title-btn">Descargar Codigos</span>
            </div>
            <div class="block-option">
              <a href="#" style="background-color:white !important;" class="btn btn-icon btn-primary btn-add-option wb-agregar-codigos" data-target="#codesModal" data-toggle="modal"></a>
              <span class="title-btn">Asignar Codigos</span>
            </div>



          </div>
      </div>
  </div>
  @include('admin.super-admin.codes.create')
</div>


    <div class="col-xlg-12 col-md-12">
        <!-- tabla veterinarias -->
        <div class="nav-tabs-content">
          <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
            <li class="active" role="presentation"><a data-toggle="tab" href="#codes" aria-controls="exampleTabsLineOne"
              role="tab">Codigos</a></li>
            <li role="presentation"><a data-toggle="tab" href="#codes-a" aria-controls="exampleTabsLineTwo"
              role="tab">Codigos Asignados</a></li>
          </ul>
          <div class="tab-content padding-top-20">
            <div class="tab-pane active" id="codes" role="tabpanel">
              <div class="panel">
                      <header class="panel-heading">
                        <div class="panel-actions"></div>
                        <br>
                      </header>
                      <div class="panel-body">
                        <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable" id="dataCodes">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Código QR</th>
                              <th>Estado</th>
                              <th>Veterinaria</th>
                              <th>Sede</th>
                              <th>Ciudad</th>
                              <th>Asignado</th>
                              <th>Fecha</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($codes as $code)
                              <tr>
                                <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$code->id}}</td>
                                <td>{{$code->codes}}</td>
                                <td>
                                  @if($code->status == TRUE)
                                    Activo
                                  @else
                                    Inactivo
                                  @endif
                                </td>
                                <td>{{$code->name}}</td>
                                <td>
                                  @if($code->principal == TRUE)
                                    Principal
                                  @else
                                    {{$code->nameHeadquarter}}
                                  @endif
                                </td>
                                <td>{{$code->city}}</td>
                                <td>
                                  @if($code->principal == TRUE)
                                    No Asignado
                                  @else
                                    Asignado
                                  @endif
                                </td>
                                <td>{{$code->created_at}}</td>
                                <td width="100">
                                  @if($code->name == "Identipet")
                                    <a href="/control/codes/assign/{{Crypt::encrypt($code->id)}}" class="btn btn-icon btn-delete-admin wb-transferir-codigo"></a>
                                  @endif
                                    <a href="/control/codes/delete/{{Crypt::encrypt($code->id)}}" class="btn btn-icon btn-delete-admin wb-eliminar-codigo"></a>
                                    <a href="/control/codes/qr/{{Crypt::encrypt($code->codes)}}" class="">
                                      <i class="fa fa-qrcode" style="font-size:19px;color: #ff0066;position: relative;top: 4px;" aria-hidden="true"></i>
                                    </a>
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
                      <header class="panel-heading">
                        <div class="panel-actions"></div>
                        <br>
                      </header>
                      <div class="panel-body">
                        <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                          <thead>
                            <tr>
                              <th><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>ID</th>
                              <th>Código QR</th>
                              <th>Estado</th>
                              <th>Veterinaria</th>
                              <th>Sede</th>
                              <th>Dirección</th>
                              <th>Ciudad</th>
                              <th>Fecha</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($codesAssign as $code)
                              <tr>
                                <td>{{$code->id}}</td>
                                <td>{{$code->codes}}</td>
                                <td>
                                  @if($code->status == TRUE)
                                    Activo
                                  @else
                                    Inactivo
                                  @endif
                                </td>
                                <td>{{$code->name}}</td>
                                <td>
                                  @if($code->principal == TRUE)
                                    Principal
                                  @else
                                    {{$code->nameHeadquarter}}
                                  @endif
                                </td>
                                <td>{{$code->address}}</td>
                                <td>{{$code->city}}</td>
                                <td>{{$code->created_at}}</td>
                                <td width="100">
                                  <a href="/control/codes/delete/{{Crypt::encrypt($code->id)}}" class="btn btn-icon btn-option wb-eliminar-codigo"></a>
                                  <a href="/control/codes/qr/{{Crypt::encrypt($code->codes)}}" class="">
                                    <i class="fa fa-qrcode" style="font-size:19px;color: #ff0066;position: relative;top: 4px;" aria-hidden="true"></i>
                                  </a>
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
