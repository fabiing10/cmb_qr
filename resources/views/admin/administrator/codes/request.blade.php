@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.administrator')
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
            <li class="active">Codigos Disponibles</li>
          </ol>
          <h2 class="page-title">Codigos Disponibles</h2>
        </div>
  </div>
</div>
<div class="row" data-plugin="matchHeight" data-by-row="true">

    <div class="col-xlg-12 col-md-12">

        <div class="nav-tabs-horizontal">
                          <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                            <li class="active" role="presentation"><a data-toggle="tab" href="#codes" aria-controls="exampleTabsLineOne" role="tab">Codigos Disponibles</a></li>
                          </ul>
                          <div class="tab-content padding-top-20">
                            <div class="tab-pane active" id="codes" role="tabpanel">
                              <div class="panel">
                                      <div class="panel-body">
                                        <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                                          <thead>
                                            <tr>
                                              <th>ID</th>
                                              <th>Codigo</th>
                                              <th>Estado</th>
                                              <th>Veterinaria</th>
                                              <th>Sede</th>
                                              <th>Fecha Creacion</th>
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
                                                <td>{{$code->city}} - {{$code->address}}</td>
                                                <td>{{$code->created_at}}</td>
                                                <td>
                                                    <a href="/administrator/codes/required/save/{{Crypt::encrypt($code->id)}}/{{$pet->id}}" class="btn btn-icon btn-option wb-transferir-codigo" style="padding: 4px;">
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

</script>
@stop
