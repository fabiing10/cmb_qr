@extends('admin.layouts.master')

@section('menu')
  @include('admin.layouts.menu.administrator')
@stop



@section('style')
<link rel="stylesheet" href="{{URL::asset('admin/assets/examples/css/widgets/statistics.css')}}">
@stop

@section('content')
<div class="row">
      <div class="col-md-4">
        <!-- Widget -->
        <a href="/administrator/clients">
        <div class="widget">
          <div class="widget-content padding-35 bg-white clearfix">
            <div class="counter counter-md pull-left text-left">
              <div class="counter-number-group">
                <span class="counter-number">{{$clients}}</span>
                <span class="counter-number-related text-capitalize">Clientes</span>
              </div>

            </div>
            <div class="pull-right white">
              <button type="button" name="button" class="btn btn-icon btn-dashboard-option wb-clients"></button>
            </div>
          </div>
        </div>
      </a>
        <!-- End Widget -->
      </div>
      <div class="col-md-4">
        <!-- Widget -->
        <a href="/administrator/pets">
        <div class="widget">
          <div class="widget-content padding-35 bg-white clearfix">
            <div class="counter counter-md pull-left text-left">
              <div class="counter-number-group">
                <span class="counter-number">{{$pets}}</span>
                <span class="counter-number-related text-capitalize">Mascotas</span>
              </div>
            </div>
            <div class="pull-right white">
              <button type="button" name="button" class="btn btn-icon btn-dashboard-option wb-pets"></button>
            </div>
          </div>
        </div>
      </a>
        <!-- End Widget -->
      </div>
      <div class="col-md-4">
        <!-- Widget -->
        <a href="/administrator/codes">
        <div class="widget">
          <div class="widget-content padding-35 bg-white clearfix">
            <div class="counter counter-md pull-left text-left">
              <div class="counter-number-group">
                <span class="counter-number">{{$codes}}</span>
                <span class="counter-number-related text-capitalize">Codigos</span>
              </div>
            </div>
            <div class="pull-right white">
              <button type="button" name="button" class="btn btn-icon btn-dashboard-option wb-codes"></button>
            </div>
          </div>
        </div>
      </a>
        <!-- End Widget -->
      </div>
</div>
<div class="row">
  <div class="col-xlg-12 col-md-12">
    <h3>Citas Medicas</h3>
  <div class="panel">
          <header class="panel-heading">
            <div class="panel-actions"></div>
            <br>
          </header>
          <div class="panel-body table-responsive">
          <table id="medicalAppointments" class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Fecha/Hora</th>
                <th>Mascota</th>
                <th>Propietario</th>
                <th>Estado</th>
                <th>Detalles</th>
              </tr>
          </thead>
        <tbody>
          @if($appointments != null)
            @foreach($appointments as $appointment)
            <tr>
              <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$appointment->dateAppointment}}</td>
              <td>{{$appointment->namePet}}</td>
              <td>{{$appointment->user}} {{$appointment->userlast}}</td>
              <td>{{$appointment->status}}</td>
              <td>
                <a class="btn btn-dark-identipet" href="administrator/appointments/details/{{Crypt::encrypt($appointment->idAppointment)}}" style=" line-height: 1em !important;">Detalles</a>
              </td>
            </tr>
            @endforeach
          @else
          <tr>
            <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>Sin datos</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          @endif

              </tbody>
            </table>
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
    $(document).ready(function($) {

    $('#medicalAppointments').dataTable( {
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
      $($.fn.dataTable.tables(true)).DataTable()
         .columns.adjust()
         .responsive.recalc();
    });
    </script>
@stop
